<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review(){

        $reviews = Review::all();
        // dd($reviews);
        $users=Review::where('user_id',auth()->user()->id)->get();
        return view('admin.pages.review.list', compact('reviews', 'users'));
    }
    public function delete($id){
        $AllReviews=Review::find($id);
        if($AllReviews){
            $AllReviews->delete();
        }
        notify()->success('Delete Review Successful');
        return redirect()->back();
     }
}
