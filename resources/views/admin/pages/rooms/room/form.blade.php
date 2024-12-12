@extends('admin.master')
@section('content')

<form action="{{route('roomlist.store')}}" method="post" enctype="multipart/form-data" >

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Room Image</label>
    <input type="file" class="form-control" name="image" placeholder="Enter room image"required>  
  </div>
  @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Room Name</label>
    <input type="text" class="form-control" name="room_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Room Name" required>
  </div>
  @error('room_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <div class="form-group">
    <label for="exampleInputEmail1">Room No</label>
    <input type="text" class="form-control" name="room_no" placeholder="Enter Room Number" required> 
  </div>
  @error('room_no')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required> 
  </div>
  @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 
  <button type="submit" class="btn btn-primary">Submit</button>
@endsection