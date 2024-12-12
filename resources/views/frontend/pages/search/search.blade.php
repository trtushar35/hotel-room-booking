@extends('frontend.partial.master')

@section('rony')

<!-- Header -->
@include('frontend.partial.header')



<form action="{{route('web.booking.form')}}" method="post">
    @csrf
    <input type="hidden" value="{{$dates}}" name="dates">

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Room List</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($rooms as $room)
                <div class="col-md-4 col-sm-6">
                    <div class="room">
                        <div class="room_img">
                            <figure><img style="width: 400px; height: 200px" src="{{ url('/uploads/rooms/',$room['image']) }}"></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{ $room['room_name'] }}</h3>
                            <h4>Price: BDT- {{ $room['amount'] }}/-</h4>
                            <h4>Room No: {{ $room['room_no'] }}</h4>

                            @if(!empty($room['discounts']))
                            @foreach($room['discounts'] as $discount)
                            <p class="text-success">
                                Discount: {{ $discount['description'] }} ({{ $discount['discount_percentage'] }}%)
                            </p>
                            <p class="text-primary">
                                Discounted Price: BDT-
                                {{ number_format($room['amount'] - ($room['amount'] * $discount['discount_percentage'] / 100), 2) }}
                            </p>
                            <p>
                                Valid From: {{ \Carbon\Carbon::parse($discount['start_date'])->format('d M, Y') }}
                                to {{ \Carbon\Carbon::parse($discount['end_date'])->format('d M, Y') }}
                            </p>
                            @endforeach
                            @else
                            <p class="text-danger">No discount applicable</p>
                            @endif

                            <label for="cars">Select Room:</label>
                            <select id="cars" name="room_no[]">
                                <option value="">Select Number of room</option>
                                <option value="1_{{$room->id}}">01</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- <a href="" class=" col-2 btn btn-info text-light container" >Booking Now</a> -->
            <button class="btn btn-success" type="submit">Book Now</button>
        </div>
    </div>
</form>

<!--  footer -->
@include('frontend.partial.footer')

@endsection