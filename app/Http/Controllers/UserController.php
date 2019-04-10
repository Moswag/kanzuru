<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    function index(){
        return view('session.signin');
    }

    function addRes(){
        return view('admin.add_resident');
    }


    function login(Request $request){
        if(User::where('employee_id',$request->employee)->exists()) {
            if (Auth::attempt(['email' => $request->employee, 'password' => $request->password])) {
                return view('admin.add_resident')->with('message', 'Welcome' . auth()->user()->name);
            } else {
                return redirect()->back()->with('error', 'Wrong password');
            }

        }
        else{
            return redirect()->back()->with('error','Employee Id is not registered, please contact admin');
        }
    }



}
