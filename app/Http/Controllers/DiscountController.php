<?php


namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Room; // Assuming Room model exists for room data
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function list()
    {
        $discounts = Discount::with('room')->get(); // Fetch discounts with room details
        
        return view('admin.pages.discounts.list', compact('discounts'));
    }

    public function form()
    {
        $rooms = Room::all(); // Fetch all rooms to populate the dropdown
        //  return $rooms;
        return view('admin.pages.discounts.form', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'discount_percentage' => 'required|numeric|between:0,100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        if ($validated->fails()) {
            notify()->error('Failed to save the discount.');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        Discount::create([
            'room_id' => $request->room_id,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        notify()->success('Discount added successfully!');
        return redirect()->route('discount.list');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id); // Fetch discount details
        $rooms = Room::all(); // Fetch all rooms for the dropdown
        return view('admin.pages.discounts.edit', compact('discount', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'discount_percentage' => 'required|numeric|between:0,100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        if ($validated->fails()) {
            notify()->error('Failed to update the discount.');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $discount = Discount::findOrFail($id);

        $discount->update([
            'room_id' => $request->room_id,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        notify()->success('Discount updated successfully!');
        return redirect()->route('discount.list');
    }

    public function delete($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        notify()->success('Discount deleted successfully!');
        return redirect()->route('discount.list');
    }
}
