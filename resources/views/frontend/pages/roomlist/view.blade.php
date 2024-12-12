@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')



<div class="container">
  <div class="row mt-5">
    
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card" style="width:400px">
        <img class="card-img-top" src="{{url('/uploads/rooms/',$Room->image)}}" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Room Name: {{$Room->room_name}}</h4>
          <p class="card-text">Ammount: BDT- {{$Room->amount}}/- per night</p>
          <p class="card-text">Room Number:{{$Room->room_no}}</p>
          <p class="card-text">Room Type: AC </p>
          <p class="card-text">Max: 2 preson </p>
          <p class="card-text">Size: 45m<sup>2</sup></p>
          <p class="card-text">View: Sea View</p>
          <p class="card-text">Bed:1</p>
          <a href="{{route('web.booking.form',$Room->id)}}" class="col-12 btn btn-primary">Booking Now</a>
          <a href="{{route('home')}}" class="col-12 btn btn-danger">Back</a>
        </div>
      </div>
    
    </div>
  </div>
</div>


<!--  footer -->
@include('frontend.partial.footer')
@endsection