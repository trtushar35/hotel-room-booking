@extends('admin.master')

@section('content')
<h2>Review List</h2>
<table class="table">
<thead>
    <tr>
      <th scope="col">Si</th>
      <th scope="col">Name</th>
      <th scope="col">Review</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  @foreach($reviews as $key=>$review)
  <tbody>
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$review->user->name}}</td>
      <td>{{$review->review}}</td>
      <td>
        <a class="btn btn-danger" href="{{route('review.delete',$review->id)}}">Delete</a>
      </td>
    </tr>
    
  </tbody>
  @endforeach
</table>





@endsection