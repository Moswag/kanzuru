<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Resident;
use App\ResidentAccount;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    function index(){
        return view('session.signin');
    }


    function login(Request $request){
        if(User::where('username',$request->username)->exists()) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                if(auth()->user()->access==AppConstants::ACCESS_ADMIN){
                    return redirect()->route('add_admin')->with('message', 'Welcome' . auth()->user()->name);
                }
                else if(auth()->user()->access==AppConstants::ACCESS_COUNCIL){
                    return redirect()->route('add_location')->with('message', 'Welcome' . auth()->user()->name);
                }
                if(auth()->user()->access==AppConstants::ACCESS_RESIDENT){
                    $resident=Resident::where('user_id',auth()->user()->id)->first();
                    User::where('id',auth()->user()->id)->update([
                        'res_id'=>$resident->id
                    ]);

                    if(ResidentAccount::where('res_id',$resident->id)->exists()){
                        return redirect()->route('add_payment')->with('message', 'Welcome' . auth()->user()->name);
                    }
                    else{
                        $account=new ResidentAccount();
                        $account->res_id=$resident->id;
                        $account->balance=0;
                        $account->status=AppConstants::STATUS_DISABLED;
                        $account->save();
                        return redirect()->route('add_payment')->with('message', 'Welcome' . auth()->user()->name);
                    }

                }

            } else {
                return redirect()->back()->with('error', 'Wrong password');
            }

        }
        else{
            return redirect()->back()->with('error','Username do not exists, please contact admin');
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');

    }
}
