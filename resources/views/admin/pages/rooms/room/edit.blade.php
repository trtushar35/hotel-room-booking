@extends('admin.master')
@section('content')

<form action="{{route('room.update',$SingleRoom->id)}}" method="post" enctype="multipart/form-data" >

  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Room Image</label>
    <input value="{{$SingleRoom->image}}" type="file" class="form-control" name="image" placeholder="Enter room image" required>  
  </div>
  @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Room Name</label>
    <input value="{{$SingleRoom->room_name}}" type="text" class="form-control" name="room_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Room Name" required>
  </div>
  @error('room_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <div class="form-group">
    <label for="exampleInputEmail1">Room No</label>
    <input value="{{$SingleRoom->room_no}}" type="text" class="form-control" name="room_no" placeholder="Enter Room Number" required> 
  </div>
  @error('room_no')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input value="{{$SingleRoom->amount}}" type="text" class="form-control" name="amount" placeholder="Enter Amount" required> 
  </div>
  @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 
  <button type="submit" class="btn btn-primary">Update</button>
@endsection