@extends('admin.master')
@section('content')

<form action="{{route('hotel.update',$AllHotel->id)}}" method="post" >

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Branch Name</label>
    <input value="{{$AllHotel->branch}}" type="text" class="form-control" name="branch_name" placeholder="Enter branch name" required>  
  </div>
  @error('branch_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <form >
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input  value="{{$AllHotel->email}}" type="email" class="form-control" name="email_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  @error('email_address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input  value="{{$AllHotel->address}}" type="text" class="form-control" name="address" placeholder="Enter address" required> 
  </div>
  @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input  value="{{$AllHotel->contuct_number}}" type="number" class="form-control"  name="contuct_number" placeholder="Enter contact number" required> 
  </div>
  @error('contuct_number')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
@endsection