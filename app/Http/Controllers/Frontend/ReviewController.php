<?php

namespace App\Http\Controllers\frontend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function review(){
        return view('frontend.pages.review.create');

    }
    public function store(Request $request){
        
            // dd($request->All());
    
            Review::create([
                'user_id'=>auth()->user()->id,
                'review'=>$request->review,
            ]);
            
            notify()->success('Thanks for your Review.');
            return redirect()->route('home');
    }
}
