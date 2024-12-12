@extends('admin.master')

@section('content')
<h1>Hotel Information</h1>

<a href="{{route('hotel.form')}}"class="btn btn-success">Add Branch</a> 

<a href="{{route('hotel.print')}}"  class="btn btn-primary">Print</a>
<table class="table">
<table class="table table-striped">
  <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Branch Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Address</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($hotels as $key=> $hotel)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>{{$hotel->branch}}</td>
      <td>{{$hotel->email}}</td>
      <td>{{$hotel->address}}</td>
      <td>{{$hotel->contuct_number}}</td>
      <td>
          <!-- Button
          <a class="btn btn-outline-success" herf=""><h6>Edit</h6></a>
          <a class="btn btn-outline-danger" herf=""><h6>Delete</h6></a>
          <a class="btn btn-outline-primary" herf=""><h6>View</h6></a> -->

          <!-- <a class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></a>
          <a class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
          <a class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a> -->
          
          
          <a href="{{route('hotel.edit',$hotel->id)}}" type="button" class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark">Edit</a>
          <a href="{{route('hotel.delete', $hotel->id)}}" type="button" class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark">Delete</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$hotels->links()}}
@endsection