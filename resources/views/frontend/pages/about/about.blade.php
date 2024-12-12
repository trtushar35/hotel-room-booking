@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')
<div class="about">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5">
            <div class="titlepage">
               <h2>About Us</h2>
               <p>Welcome to the epitome of coastal elegance and unparalleled tranquility – welcome to Hotel Sea View. Nestled along the pristine shores, we redefine the art of seaside hospitality, offering an experience that seamlessly blends luxury, comfort, and the breathtaking beauty of the sea........</p>
               <a href="{{route('web.about.read_more')}}" type="button" class="btn btn-primary"  >
                  Read More
               </a>
               
            </div>
         </div>
         <div class="col-md-7">
            <div class="about_img">
               <figure><img src="{{url('frontend/images/about.png')}}" alt="#" /></figure>
            </div>
         </div>
      </div>
   </div>
</div>


@include('frontend.partial.footer')
@endsection