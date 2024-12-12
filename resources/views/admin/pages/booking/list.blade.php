@extends('admin.master')

@section('content')

 <!-- Print Button -->
 

<div class="container mt-4">
<div class="text-end mb-3">
        <a href="{{ route('booking.list.print') }}" class="btn btn-success">Print</a>
    </div>
    <h1 class="text-center mb-4 bg-secondary text-white py-3">Booking List</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">SI</th>
                    <th scope="col">Customer Details</th>
                    <th scope="col">No of Guests</th>
                    <th scope="col">Room Details</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($bookings as $key => $booking)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>

                    <!-- Customer Details -->
                    <td>
                        <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>{{ $booking->name }}</strong></p>
                            <p><strong>{{ $booking->phone }}</strong></p>
                        </div>
                    </td>

                    <!-- No of Guests -->
                    <td>
                        <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>Adults: {{ $booking->adults }}</strong></p>
                            <p><strong>Children: {{ $booking->children }}</strong></p>
                        </div>
                    </td>

                    <!-- Room Details -->
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

                    <!-- Check-In and Check-Out -->
                    <td>
                        <div class="p-2 border rounded bg-light mb-2">
                            <p><strong>Checkin: {{ $booking->checkin }}</strong></p>
                            <p><strong>Checkout: {{ $booking->checkout }}</strong></p>
                        </div>
                    </td>

                    <!-- Status -->
                    <td>
                        <span class="badge 
                            {{ $booking->status == 'pending' ? 'bg-warning' : ($booking->status == 'confirmed' ? 'bg-success' : 'bg-danger') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>

                    <!-- Payment Status -->
                    <td>
                        <span class="badge 
                            {{ $booking->payment_status == 'Paid' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst($booking->payment_status) }}
                        </span>
                    </td>

                    <!-- Transaction ID -->
                    <td>{{ $booking->transaction_id }}</td>

                    <!-- Action -->
                    <td>
                        @if($booking->status == 'pending')
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('booking.accept', $booking->id) }}" class="btn btn-sm btn-success">Accept</a>
                            <a href="{{ route('booking.reject', $booking->id) }}" class="btn btn-sm btn-danger">Reject</a>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
