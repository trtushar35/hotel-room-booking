<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('admin.pages.login');
    }

    public function loginPost(Request $request)
    {
        $val = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
        );
    
        if ($val->fails()) {
         
            session()->flash('error', 'Login failed due to validation errors.');
            return redirect()->back()->withErrors($val);
        }
    
        $credentials = $request->only('email', 'password');
        $login = auth()->attempt($credentials);
    
        if ($login) {
          
            notify()->success('Login successful.');
            return redirect()->route('dashboard');
        }
        session()->flash('error', 'Invalid email or password.');
        return redirect()->back();
    }
    
    
    public function logout()
    {

        auth()->logout();

    
        return redirect()->route('admin.login');
        notify()->success('Logout Success');
    }

    public function list()
    {
        $users = User::all();
        return view('admin.pages.users.list', compact('users'));
    }

    public function form()
    {

        return view('admin.pages.users.form');
    }

    public function store(Request $request)
    {

        // $valided=Validator::make($request->all(),[
        //        'name'=>'required',
        //        'email'=>'required',
        //        'role'=>'required',
        //        'image'=>'required'
        //    ]);

        //    if($valided->fails()){
        //        return redirect()->back()->witherrors($valided);
        //    }

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/users', $fileName);
        }
        User::create([
            'name' => $request->name,
            'image' => $fileName,
            'email' => $request->email,
            'role' => $request->role,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password' => $request->password,
        ]);
        notify()->success('Store Success');
        return redirect()->back();
    }

    public function profile($user_id)
    {
        $user_id = User::find($user_id);
        return view('admin.pages.profile.profile', compact('user_id'));
    }
    public function edit($id){
        $Users=User::find($id);
        return view ('admin.pages.users.edit',compact('Users'));
     }
     public function update(Request $request,$id){
         $Users=User::find($id);
         $fileName=$Users->image;
         if($request->hasFile('image'))
         {
             $file=$request->file('image');
             $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
             $file->storeAs('/users',$fileName);
 
         }
         $Users->update([
             'image'=>$fileName,
             'name'=>$request->name,
             'phone'=>$request->phone,
             'address'=>$request->address,
             'email'=>$request->email,
             'password'=>$request->password    
     
         ]);
         return redirect()->back();
      }
 
      public function delete($id){
         $Users=User::find($id);
         if($Users){
             $Users->delete();
         }
         return redirect()->back();
      }
      public function print()
    {
        $users = User::all();
        return view('admin.pages.users.print', compact('users'));
    }
}
