@extends('admin.master')
@section('content')

<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input type="file" class="form-control" name="image" placeholder="Choose Image">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Role</label>
        <select class="form-control" name="role">
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Phone No</label>
        <input type="number" class="form-control" name="phone" placeholder="Enter Phone No">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Address">
    </div>

    
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
    </div>

    
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    @endsection