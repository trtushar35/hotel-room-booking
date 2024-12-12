@extends('admin.master')
@section('content')

<h2>Add Discount</h2>

<form action="{{ route('discount.store') }}" method="post">
    @csrf
    <div class="form-group">
    <label for="room_id">Select Room</label>
    <select name="room_id" class="form-control" required style="">
        @foreach ($rooms as $room)
        <option value="{{ $room->id }}" style="color: black; background-color: #ffffff;">{{ $room->room_name }}-{{$room->room_no}}</option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" name="discount_percentage" class="form-control" step="0.01" placeholder="Enter discount percentage" required>
    </div>

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
