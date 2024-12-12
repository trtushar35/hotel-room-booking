@extends('admin.master')
@section('content')

<h2>Edit Discount</h2>

<form action="{{ route('discount.update', $discount->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="room_id">Select Room</label>
        <select name="room_id" class="form-control" required>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ $room->id == $discount->room_id ? 'selected' : '' }}>
                    {{ $room->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" name="discount_percentage" class="form-control" step="0.01" value="{{ $discount->discount_percentage }}" required>
    </div>

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" value="{{ $discount->start_date }}" required>
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" class="form-control" value="{{ $discount->end_date }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $discount->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
