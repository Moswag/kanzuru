<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Resident;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{









    function changePassword(){
        return view('admin.change_password');
    }

    function savePassword(Request $request){
        if($request->password==$request->password_confirmation){
            $user=User::where('username',auth()->user()->username)->update([
                'password'=>bcrypt($request->password)
            ]);
            if($user){
                return back()->with('message','Password successfully changed');
            }
            else{
                return back()->with('error','Failed to change password, please contact admin');
            }
        }
        else{
            return back()->with('error','Password should match');
        }

    }










}
