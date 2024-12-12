@extends('admin.master')

@section('content')
<h1>Room Type</h1>
<a href="{{route('roomtype.form')}}"class="btn btn-success">Add Room Type</a>

<a href="{{route('roomtype.print')}}"class="btn btn-primary">Print</a>
<table class="table">
<table class="table table-striped">
  <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Room Image</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($roomtypes as $key=> $roomtype)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
        <td>
        <img width="100" height="70" src="{{ url('/uploads/rooms/',$roomtype->room_image) }}" alt="room image not found">
      
        </td>
      <td>{{$roomtype->name}}</td>
      <td>{{$roomtype->amount}}</td>
      
      <td>
          

          <a type="button" href="{{route('website.roomview', $roomtype->id)}}" class="btn btn-outline-primary">View</a>
          <a type="button" href="{{route('roomtype.edit', $roomtype->id)}}" class="btn btn-outline-success">Edit</a>
          <a type="button" href="{{route('roomtype.delete', $roomtype->id)}}"class="btn btn-outline-danger">Delete</a>
          

          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$roomtypes->links()}}
@endsection