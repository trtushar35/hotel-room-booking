<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Booking;
use App\Models\Booking_room;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.pages.login.form');
    }

    public function loginPosts(Request $request)
    {
        $val = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
        );

        if ($val->fails()) {
            //message
            return redirect()->back()->withErrors($val);
        }

        $credentials = $request->except('_token');
        // $credentials=$request->only('email','password');

        // if(auth()->attempt($credentials))

        $login = auth()->attempt($credentials);
        if ($login) {
            notify()->success('Login Successfull');
            return redirect()->route('home');
        }
        session()->flash('error','Invalid email or password');
        return redirect()->back();
    }
    public function web_logout()
    {

        auth()->logout();
        notify()->info('Logout Successfull');
        return redirect()->route('home');
    }


    public function registration()
    {
        return view('frontend.pages.registration.form');
       
    }

    public function user_registration(Request $request)
    {
        //dd($request);
        // $validate=Validator::make($request->all(),[
        //      'first_name'=>'required',
        //      'last_name'=>'required',
        //      'contuct_number'=>'required',
        //      'email'=>'required',
        //      'password'=>'required'
        // ]);

        // if($validate->fails()){
        //     return redirect()->back();
        // }

        User::create([
            'name' => $request->name,
            'image' => $request->image,
            'role' => 'customer',
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session()->flash('success','Registration Successfull');
        return redirect()->route('website.login');
    }
    

    //public function profile($id)
// {
//     $id = Crypt::decrypt($id);
//     $measurements =  DB::select( DB::raw("SELECT * FROM measurements WHERE custom_id = '$id'") );
//     $customers = DB::table('customers')->where('customer_id', '=', $id)->get();
//     return view('measurements.profile', compact('measurements','customers'));
// }
    public function profile()
    {
        
        $bookings=Booking::all();
        $booking=Booking_room::with('bookings');
        // dd($bookings);
        return view('frontend.pages.profile.view', compact('bookings', 'booking'));
    }

    public function form($id){
        $AllUser=User::find($id);
        return view('frontend.pages.profile.form',compact('AllUser'));
    }

    public function update(Request $request,$id){
        $AllUser=User::find($id);
        
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/users', $fileName);
        }
    



        $AllUser->update([
            'name' => $request->name,
            'image' => $fileName,
            'role' => 'customer',
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        notify()->success('Successful');
        return redirect()->back();
}
}
