<?php

namespace App\Http\Controllers\frontend;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Discount;
use App\Models\Booking_room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Library\SslCommerz\SslCommerzNotification;

class BookingController extends Controller
{
  public function form(Request $request)
  {
    // dd($request->all());


    $rooms = json_encode(array_filter($request->room_no));

    $dates = json_decode($request->dates, true);
    // dd($dates);
    $checkin = $dates['checkin'];
    $checkout = $dates['checkout'];
    $discounts = Discount::all(); // Fetch all discounts

    return view('frontend.pages.booking.form', compact('checkin', 'checkout', 'rooms', 'discounts'));
  }



  public function store(Request $request)
  {
    // dd($request->all());

    // Validate the incoming request
    $validated = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric',
      'adults' => 'required|integer|min:1',
      'children' => 'required|integer|min:0',
      'checkin' => 'required|date',
      'checkout' => 'required|date|after_or_equal:checkin',
      'rooms' => 'required|json',
      'discount_id' => 'nullable|json',
    ]);

    if ($validated->fails()) {
      notify()->error('Validation failed');
      return redirect()->back()->withErrors($validated)->withInput();
    }

    // Decode rooms JSON
    $rooms = json_decode($request->rooms, true);
    $discounts = json_decode($request->discount_id, true); // Decode the discounts JSON

    // dd($rooms);

    $totalAmount = 0;
    $discountAmount = 0;


    // Calculate final amount after discount
    
    // return $finalAmount;

    // Create a new booking
    $booking = Booking::create([
      'user_id' => auth()->user()->id,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'adults' => $request->adults,
      'children' => $request->children,
      'checkin' => $request->checkin,
      'checkout' => $request->checkout,
      'transaction_id' => date('YmdHis'),
      'payment_status' => 'pending',
      'discount_amount' => 0,
      'final_amount' => 0,
    ]);

    foreach ($rooms as $room) {
      $room_id = explode('_', $room)[1];
      $quantity = explode('_', $room)[0];

      // dd($room_id);
      $actualRoom = Room::find($room_id);
      if (!$actualRoom) {
        notify()->error('Room not found');
        return redirect()->back();
      }

      $sub_total = $actualRoom->amount * $quantity;
      $totalAmount += $sub_total;

      // Check if a discount applies to this room
      $roomDiscount = collect($discounts)->firstWhere('room_id', $room_id);

      if ($roomDiscount) {
        // Check if the discount is valid for the booking dates
        $checkinDate = \Carbon\Carbon::parse($request->checkin);
        $checkoutDate = \Carbon\Carbon::parse($request->checkout);
        $startDate = \Carbon\Carbon::parse($roomDiscount['start_date']);
        $endDate = \Carbon\Carbon::parse($roomDiscount['end_date']);

        if ($checkinDate->between($startDate, $endDate) || $checkoutDate->between($startDate, $endDate)) {
          // Calculate the discount amount for this room
          $roomDiscountAmount = ($sub_total * $roomDiscount['discount_percentage']) / 100;
          $discountAmount += $roomDiscountAmount;
        }
      }

      Booking_room::create([
        'booking_id' => $booking->id, // Will update after booking creation
        'room_id' => $room_id,
        'quantity' => $quantity,
        'sub_total' => $sub_total,
        'date' => $request->checkin,
      ]);
    }

    $bookingAmount = Booking::find($booking->id);

    $finalAmount = $totalAmount - $discountAmount;

    $bookingAmount->update([
      'discount_amount' => $discountAmount,
      'final_amount' => $finalAmount
    ]);

    // Notify success and redirect
    notify()->success('Booking Successful');
    return redirect()->route('home');
  }


  public function booking_list($id)
  {
    $bookings = Booking::with('booking_room.room')->where('user_id', auth()->user()->id)->get();

    //return  $bookings;
    return view('frontend.pages.booking.list', compact('bookings'));
  }

  public function cancel_booking($id)
  {
    $bookings = Booking::find($id);
    //dd($bookings);
    if ($bookings) {
      $bookings->update([
        'status' => 'Cancelled'
      ]);
    }
    notify()->success('You cancel the booking');
    return redirect()->back();
  }

  public function payment($booking_id)
  {
    // dd($booking_id);
    $booking_details = Booking::with('booking_room')->find($booking_id);

    // Ensure booking details exist
    if (!$booking_details) {
      return response()->json(['error' => 'Booking not found'], 404);
    }

    $post_data = array();
    $total_amount = 0;

    // Check if `final_amount` is null and use `subtotal` from `booking_room`
    if ($booking_details->final_amount !== null) {
      $total_amount = $booking_details->final_amount;
    } else {
      $total_amount = $booking_details->booking_room->sum('sub_total');
    }

    $post_data['total_amount'] = (int)$total_amount;

    // Ensure the total amount is at least 10
    if ($post_data['total_amount'] < 10) {
      return response()->json(['error' => 'Total amount cannot be less than 10'], 400);
    }

    // Proceed with the rest of your logic

    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = $booking_details->transaction_id; // tran_id must be unique

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = 'Customer Name';
    $post_data['cus_email'] = 'customer@mail.com';
    $post_data['cus_add1'] = 'Customer Address';
    $post_data['cus_add2'] = "";
    $post_data['cus_city'] = "";
    $post_data['cus_state'] = "";
    $post_data['cus_postcode'] = "";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = '8801XXXXXXXXX';
    $post_data['cus_fax'] = "";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    $post_data['shipping_method'] = "NO";
    $post_data['product_name'] = "Computer";
    $post_data['product_category'] = "Goods";
    $post_data['product_profile'] = "physical-goods";

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = "ref001";
    $post_data['value_b'] = "ref002";
    $post_data['value_c'] = "ref003";
    $post_data['value_d'] = "ref004";

    $sslc = new SslCommerzNotification();
    # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    $payment_options = $sslc->makePayment($post_data, 'hosted');

    if (!is_array($payment_options)) {
      print_r($payment_options);
      $payment_options = array();
    }
  }
}
