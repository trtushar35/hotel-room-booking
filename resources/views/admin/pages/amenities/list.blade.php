@extends('admin.master')

@section('content')
<h2>Amenities List</h2>
<a href="{{route('amenities.form')}}" class="btn btn-success">Add Amenities</a>
<a href="{{route('amenities.print')}}" class="btn btn-primary">Print</a>

<table class="table">
  <thead>
  <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Amenities Type</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($allAmenities as $key=> $amenities)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>{{$amenities->amenities_type}}</td>
        <td>
        <img width="70" height="40" src="{{ url('/uploads/amenities',$amenities->image) }}" alt="amenities image not found">
      
        </td>
      
      
      
      <td>
          

          <a type="button" href="{{route('website.amenitiesview',$amenities->id)}}" class="btn btn-outline-primary">View</a>
          <a type="button" href="{{route('amenities.edit',$amenities->id)}}" class="btn btn-outline-success">Edit</a>
          <a type="button" href="{{route('amenities.delete',$amenities->id)}}"class="btn btn-outline-danger">Delete</a>
          

          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$allAmenities->links()}}
@endsection