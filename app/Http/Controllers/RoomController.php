<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{

    public function list()
    {
        $rooms = Room::paginate(3);
        //dd( $rooms);
        return view('admin.pages.rooms.room.list', compact('rooms'));
    }
    public function form()
    {
        return view('admin.pages.rooms.room.form');
    }
    public function store(Request $request)
    {
        $valided = Validator::make($request->all(), [
            'image' => 'required',
            'room_name' => 'required',
            'room_no' => 'required',
            'amount' => 'required|numeric|gt:0'
        ]);

        if ($valided->fails()) {
            notify()->error('Failed');
            return redirect()->back()->witherrors($valided);
        }

        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/rooms', $fileName);
        }


        Room::create([
            'image' => $fileName,
            'room_name' => $request->room_name,
            'room_no' => $request->room_no,
            'amount' => $request->amount

        ]);
        notify()->success('Successful!');
        return redirect()->back()->witherrors($valided);
    }

    public function edit($id)
    {
        $SingleRoom = Room::find($id);
        return view('admin.pages.rooms.room.edit', compact('SingleRoom'));
    }
    public function update(Request $request, $id)
    {
        $SingleRoom = Room::find($id);
        $fileName = $SingleRoom->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/rooms', $fileName);
        }
        $SingleRoom->update([
            'image' => $fileName,
            'room_name' => $request->room_name,
            'room_no' => $request->room_no,
            'amount' => $request->amount,

        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $SingleRoom = Room::find($id);
        if ($SingleRoom) {
            // Delete dependent rows in booking_rooms
            Booking_room::where('room_id', $SingleRoom->id)->delete();
    
            // Now delete the room
            $SingleRoom->delete();
        }
        return redirect()->back();
    }

    public function print()
    {
        $rooms = Room::all();
        return view('admin.pages.rooms.room.print', compact('rooms'));
    }
}
