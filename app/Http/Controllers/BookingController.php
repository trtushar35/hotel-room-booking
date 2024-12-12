<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function list(){
        
        $bookings=Booking::with('booking_room.room')->get();
        return view('admin.pages.booking.list',compact('bookings'));
    } 
    public function accept($id){
        $bookings=Booking::find($id);
        //dd($bookings);
        if($bookings){
            $bookings->update([
                'status'=>'Accept'
            ]);
        }
        notify()->success('Booking Accepted');
        return redirect()->back();
    } 
    public function reject($id){
        $bookings=Booking::find($id);
        //dd($bookings);
        if($bookings){
            $bookings->update([
                'status'=>'Rejected'
            ]);
        }
        notify()->error('Booking Rejected');
        return redirect()->back();

    }
    public function print(){
        $bookings=Booking::all();
        return view('admin.pages.booking.print',compact('bookings'));
    } 
    
} 

