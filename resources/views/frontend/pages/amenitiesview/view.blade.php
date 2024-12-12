@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')



<div class="container">
  <div class="row mt-5">
    
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card" style="width:400px">
        <img class="card-img-top" src="{{url('/uploads/amenities/',$allAmenities->image)}}" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Amenities Name: {{$allAmenities->name}}</h4>
          <a href="{{route('home')}}" class="col-12 btn btn-primary">Back</a>
        </div>
      </div>
    
    </div>


    <div class="col-md-3"></div>
  </div>
</div>


<!--  footer -->
@include('frontend.partial.footer')
@endsection