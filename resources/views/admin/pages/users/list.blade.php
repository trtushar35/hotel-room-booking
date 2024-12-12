@extends('admin.master')

@section('content')
<h2>User Information</h2>
<a href="{{route('user.form')}}"class="btn btn-success">Add User</a>

<a href="{{route('user.print')}}"  class="btn btn-primary">Print</a>


<table class="table">
  <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $key=>$user)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>
        <img style="border-radius: 50%;" height="40" width="40" src="{{url('uploads/users',$user->image)}}" alt="">
      </td>
      <td>{{$user->name}}</td>
      <td>{{$user->role}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>
          <a type="button" href="{{route('admin.profile',$user->id)}}" class="btn btn-outline-primary">View</a>
          <a type="button" href="{{route('profile.edit',$user->id)}}" class="btn btn-outline-success">Edit</a>
          <a type="button" href="{{route('profile.delete',$user->id)}}"class="btn btn-outline-danger">Delete</a>
          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection