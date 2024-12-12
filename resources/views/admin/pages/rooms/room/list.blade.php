@extends('admin.master')

@section('content')
<h1>Room List</h1>
<a href="{{route('roomlist.form')}}"class="btn btn-success">Add Room </a>

<a href="{{route('room.print')}}"class="btn btn-primary">Print</a>
<table class="table">
<table class="table table-striped">
  <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Room Image</th>
      <th scope="col">Room Name</th>
      <th scope="col">Room No</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($rooms as $key=> $room)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>
        <img width="100" height="70" src="{{ url('/uploads/rooms/',$room->image) }}" alt="room image not found">
      
        </td>
      <td>{{$room->room_name}}</td>
      <td>{{$room->room_no}}</td>
      <td>{{$room->amount}}</td>
      
      <td>
      <a type="button" href="{{route('room.edit', $room->id)}}" class="btn btn-outline-success">Edit</a>
      <a type="button" href="{{route('room.delete', $room->id)}}" class="btn btn-outline-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$rooms->links()}}
@endsection