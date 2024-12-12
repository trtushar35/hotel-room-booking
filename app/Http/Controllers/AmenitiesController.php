<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmenitiesController extends Controller
{
    public function list(){
       
        $allAmenities=Amenities::paginate(3);
        
        return view('admin.pages.amenities.list',compact('allAmenities'));
    }
    public function form(){
        return view('admin.pages.amenities.form');
    }
    public function store(Request $request){
        // dd($request->all());
        $valided=Validator::make($request->all(),[
            'amenities_type'=>'required',
            'image'=>'required',
           
        ]);
    
        if($valided->fails()){
            return redirect()->back()->witherrors($valided);
        }
    
        $fileName=null;
            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('/amenities',$fileName);
    
            }
    
    
    
        Amenities::create([
            'amenities_type'=>$request->amenities_type,
            'image'=>$fileName,
        ]);
        notify()->success('Add Amenities Successful');
        return redirect()->back();
        } 

        public function edit($id){
            $AllAmenities=Amenities::find($id);
            return view ('admin.pages.amenities.edit',compact('AllAmenities'));
         }
         public function update(Request $request,$id){
             $AllAmenities=Amenities::find($id);
             $fileName=$AllAmenities->room_image;
             if($request->hasFile('image'))
             {
                 $file=$request->file('image');
                 $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
                 $file->storeAs('/amenities',$fileName);
     
             }
             $AllAmenities->update([
                'amenities_type'=>$request->amenities_type,
                 'image'=>$fileName,
             ]);
             notify()->success('Update Amenities Successful');
             return redirect()->back();
          }
     
          public function delete($id){
             $AllAmenities=Amenities::find($id);
             if($AllAmenities){
                 $AllAmenities->delete();
             }
             notify()->success('Delete Amenities Successful');
             return redirect()->back();
          }

          public function print(){
       
            $allAmenities=Amenities::all();
            
            return view('admin.pages.amenities.print',compact('allAmenities'));
        }
}
