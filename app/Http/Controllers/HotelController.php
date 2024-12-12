<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class HotelController extends Controller
{
    public function list(){
        $hotels=Hotel::paginate(3);
        return view('admin.pages.hotel.list',compact('hotels'));
    }
    public function form(){
        return view('admin.pages.hotel.form');
    }
    
    public function store(Request $request){
        // dd($request->all());
        $valided=Validator::make($request->all(),[
            'branch_name'=>'required',
            'email_address'=>'required',
            'address'=>'required',
            'contuct_number'=>'required'
        ]);

        if($valided->fails()){
            return redirect()->back()->witherrors($valided);
        }
        

        Hotel::create([
            'branch'=>$request->branch_name,
            'email'=>$request->email_address,
            'address'=>$request->address,
            'contuct_number'=>$request->contuct_number,
            'action'=>$request->action

        ]);
        notify()->success('Successfully Store');
        return redirect()->back()->witherrors($valided);
    
    }

    public function edit($id){
        $AllHotel=Hotel::find($id);
        return view ('admin.pages.hotel.edit',compact('AllHotel'));
     }
    

     public function update(Request $request,$id){
        $AllHotel=Hotel::find($id);
        $AllHotel->update([
            'branch'=>$request->branch_name,
            'email'=>$request->email_address,
            'address'=>$request->address,
            'contuct_number'=>$request->contuct_number
        ]);
        notify()->success('Update Hotel');
        return redirect()->back();
     } 

     public function delete($id){
        $AllHotel=Hotel::find($id);
        if($AllHotel){
            $AllHotel->delete();
        }
        notify()->success('Delete Hotel Successfully');
        return redirect()->back();
     }

     public function print()
    {
        $hotels = Hotel::all();
        return view('admin.pages.hotel.print', compact('hotels'));
    }
}
