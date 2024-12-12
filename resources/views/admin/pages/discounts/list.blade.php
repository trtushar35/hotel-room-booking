@extends('admin.master')
@section('content')

<h2>Discount List</h2>
<a href="{{ route('discount.form') }}" class="btn btn-primary mb-3">Add Discount</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Room Name</th>
            <th>Discount (%)</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($discounts as $discount)
        <tr>
            <td>{{ $discount->id }}</td>
            <td>{{ $discount->room->room_name }}-{{$discount->room->room_no}}</td> <!-- Access the room name -->
            <td>{{ $discount->discount_percentage }}%</td>
            <td>{{ $discount->start_date }}</td>
            <td>{{ $discount->end_date }}</td>
            <td>{{ $discount->description }}</td>
            <td>
                <a href="{{ route('discount.edit', $discount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('discount.delete', $discount->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection