@extends('admin.master')
@section('content')

<form action="{{route('amenities.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Amenities Type</label>
    <input type="text" class="form-control" name="amenities_type"  placeholder="Enter Amenities">
  </div>
  @error('amenities_type')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control"  name="image" placeholder="Choose Image" required> 
  </div>
  @error('image')
    <div class="alert alert-danger">{{ $message }}</div>  
    @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection