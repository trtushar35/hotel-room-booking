<?php

namespace App\Http\Controllers\frontend;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenitiesController extends Controller
{
    public function view($id){
        $allAmenities=Amenities::find($id);
         return view("frontend.pages.amenitiesview.view",compact('allAmenities'));
    }
}
