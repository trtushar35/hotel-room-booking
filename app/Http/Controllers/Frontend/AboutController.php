<?php

namespace App\Http\Controllers\frontend/AboutController.php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        return view('frontend.pages.sidepages.about');
    }
}
