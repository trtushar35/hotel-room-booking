@extends('admin.master')
@section('content')

<form action="{{route('roomtype.update',$SingleRoomtype->id)}}" method="post" enctype="multipart/form-data">

  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Room Image</label>
    <input value="{{$SingleRoomtype->room_image}}" type="file" class="form-control" name="room_image" placeholder="Choose file" >  
  </div>
  @error('room_image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <form >
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{$SingleRoomtype->name}}" type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">  
  </div>
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input value="{{$SingleRoomtype->amount}}" type="number" class="form-control" name="amount" placeholder="Enter amount"> 
  </div>
  @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <button type="submit" class="btn btn-success">Update</button>
@endsection