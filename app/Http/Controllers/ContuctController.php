<?php

namespace App\Http\Controllers;

use App\Models\Contuct_us;
use Illuminate\Http\Request;

class ContuctController extends Controller
{
    public function list(){
        
        $contuct=Contuct_us::paginate(3);
       
        return view('admin.pages.contuctlist.list',compact('contuct'));
    }
}
