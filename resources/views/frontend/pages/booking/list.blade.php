@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')

<div class="container mt-4">
    <h1 class="text-center mb-4 bg-secondary text-white py-3">Booking List</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Personal Information</th>
                    <th scope="col">No of guest</th>
                    <th scope="col">Room Details</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($bookings as $key => $booking)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                    <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>{{ $booking->name }}</strong></p>
                            <p><strong>{{ $booking->phone }}</strong></p>
                        </div>
                    </td>
                    <td>
                    <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>Adults:{{ $booking->adults }}</strong></p>
                            <p><strong>Child:{{ $booking->children }}</strong></p>
                        </div>
                    </td>
                    <td>
                        @foreach ($booking->booking_room as $roomBooking)
                        @if($roomBooking->room)
                        <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>Room Name:</strong> {{ $roomBooking->room->room_name }}</p>
                            <p><strong>Room No:</strong> {{ $roomBooking->room->room_no }}</p>
                            <p><strong>Sub-total:</strong> {{ $roomBooking->sub_total }}</p>
                            <p><strong>Discount Amount:</strong> {{ $booking->discount_amount }}</p>
                            <p><strong>Final Amount:</strong> {{ $booking->final_amount }}</p>
                           
                        </div>
                        @else
                        <p>Room info not found</p>
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $booking->checkin }}</td>
                    <td>{{ $booking->checkout }}</td>
                    <td>
                        <span class="badge 
                            {{ $booking->status == 'pending' ? 'bg-warning' : ($booking->status == 'Accept' ? 'bg-success' : 'bg-danger') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge 
                            {{ $booking->payment_status == 'Paid' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst($booking->payment_status) }}
                        </span>
                    </td>
                    <td>
                        @if($booking->status == 'pending')
                        <a href="{{ route('web.booking.cancel', $booking->id) }}" class="btn btn-sm btn-danger">Cancel Booking</a>
                        @elseif($booking->status == 'Accept')
                        <a href="{{ route('payment', $booking->id) }}"
                            class="btn btn-sm btn-primary {{ $booking->payment_status == 'paid' ? 'disabled' : '' }}"
                            title="{{ $booking->payment_status == 'paid' ? 'Payment already completed' : '' }}">
                            Payment
                        </a>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('frontend.partial.footer')
@endsection