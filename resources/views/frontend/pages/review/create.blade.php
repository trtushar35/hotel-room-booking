@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')

<form action="{{route('web.review.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
  </div>

  


  <button class="btn btn-success">Submit</button>
  

<!-- rating.js file -->

</form>
@include('frontend.partial.footer')
@endsection