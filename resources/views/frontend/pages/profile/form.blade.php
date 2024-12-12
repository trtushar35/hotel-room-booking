@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')
<div class="container">
    <form action="{{route('web.profile.update',auth()->user()->id)}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input value="{{$AllUser->name}}" type='text' class="form-control" name="name" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input value="{{$AllUser->image}}" type="file" class="form-control" name="image" placeholder="Choose Image">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <select class="form-control" name="role">
                <option value="admin">Customer</option>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Phone No</label>
            <input value="{{$AllUser->phone}}" type="number" class="form-control" name="phone" placeholder="Enter Phone No">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input  value="{{$AllUser->address}}" type="text" class="form-control" name="address" placeholder="Enter Address">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input value="{{$AllUser->email}}" type="email" class="form-control" name="email" placeholder="Enter Email Address">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input value="{{$AllUser->password}}" type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
@include('frontend.partial.footer')
@endsection