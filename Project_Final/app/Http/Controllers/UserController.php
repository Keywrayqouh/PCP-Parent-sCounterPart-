<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Human;

class UserController extends Controller
{
    public function welcome(Request $request){
        // dd(Human::get());
        $humans = Human::all();
        // $humans =Human::where('id',$request->id)->get();
        return view('test.welcome',compact('humans'));
    }
}
