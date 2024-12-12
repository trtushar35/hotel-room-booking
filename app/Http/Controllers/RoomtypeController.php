<?php

namespace App\Http\Controllers;

use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomtypeController extends Controller
{
    public function list()
    {
        $roomtypes = Roomtype::paginate(3);
        return view('admin.pages.rooms.roomtype.list', compact('roomtypes'));
    }
    public function form()
    {
        return view('admin.pages.rooms.roomtype.form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $valided = Validator::make($request->all(), [
            'room_image' => 'required',
            'name' => 'required',
            'amount' => 'required|numeric|gt:0'
        ]);

        if ($valided->fails()) {
            return redirect()->back()->witherrors($valided);
        }

        $fileName = null;
        if ($request->hasFile('room_image')) {
            $file = $request->file('room_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/rooms', $fileName);
        }



        Roomtype::create([
            'room_image' => $fileName,
            'name' => $request->name,
            'amount' => $request->amount



        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $SingleRoomtype = Roomtype::find($id);
        return view('admin.pages.rooms.roomtype.edit', compact('SingleRoomtype'));
    }
    public function update(Request $request, $id)
    {
        $SingleRoomtype = Roomtype::find($id);
        $fileName = $SingleRoomtype->room_image;
        if ($request->hasFile('room_image')) {
            $file = $request->file('room_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/rooms', $fileName);
        }
        $SingleRoomtype->update([
            'room_image' => $fileName,
            'name' => $request->name,
            'amount' => $request->amount

        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $SingleRoomtype = Roomtype::find($id);
        if ($SingleRoomtype) {
            $SingleRoomtype->delete();
        }
        return redirect()->back();
    }

    public function print()
    {
        $roomtypes = Roomtype::all();
        return view('admin.pages.rooms.roomtype.print', compact('roomtypes'));
    }
}
