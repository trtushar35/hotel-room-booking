<?php

namespace App\Http\Controllers\frontend;

use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function view($id){
        $Roomtype=Roomtype::find($id);
         return view("frontend.pages.roomview.view",compact('Roomtype'));
    }

    public function viewlist($id){
        $Room=Room::find($id);
         return view("frontend.pages.roomlist.view",compact('Room'));
    }
}
