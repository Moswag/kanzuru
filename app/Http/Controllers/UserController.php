<?php

namespace App\Http\Controllers;

use App\Resident;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    function index(){
        return view('session.signin');
    }


    function login(Request $request){
        if(User::where('employee_id',$request->employee_id)->exists()) {
            if (Auth::attempt(['employee_id' => $request->employee_id, 'password' => $request->password])) {
                return redirect()->route('add_user')->with('message', 'Welcome' . auth()->user()->name);
            } else {
                return redirect()->back()->with('error', 'Wrong password');
            }

        }
        else{
            return redirect()->back()->with('error','Employee Id is not registered, please contact admin');
        }
    }

    function addUser(){
        return view('admin.user.add_user');
    }


    function saveUser(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->employee_id=$request->employee_id;
        $user->national_id=$request->national_id;
        $user->address=$request->address;
        $user->password=bcrypt($request->employee_id);
        if($user->save()){
            return redirect()->route('view_users')->with('message','User successfully added');
        }
        else{
            return back()->with('error','User failed to be added, please contact admin');
        }

    }

    function viewUsers(){
        $users=User::where('id','<>',auth()->user()->id)->get();
        return view('admin.user.view_users',compact('users'));
    }


    function editUser($id){
        $user=User::find($id);
        return view('admin.user.user.edit_user',compact('user'));
    }

    function updateUser(Request $request){
        $user=User::where('employee_id',$request->employee_id)->update([
            'name'=>$request->name,
            'national_id'=>$request->national_id,
            'address'=>$request->address
        ]);
        if($user){
            return redirect()->route('view_users')->with('message','User successfully updated');
        }
        else{
            return back()->with('error','Failed to update user, please contact admin');
        }
    }

    function deleteUser($id){
        if(User::find($id)->delete()){
            return redirect()->route('view_users')->with('message','User successfully deleted');
        }
        else{
            return back()->with('error','Failed to delete user, please contact admin');
        }
    }


    function changePassword(){
        return view('admin.change_password');
    }

    function savePassword(Request $request){
        if($request->password==$request->password_confirmation){
            $user=User::where('employee_id',auth()->user()->employee_id)->update([
                'password'=>bcrypt($request->password)
            ]);
            if($user){
                return redirect()->route('view_users')->with('message','Password successfully changed');
            }
            else{
                return back()->with('error','Failed to change password, please contact admin');
            }
        }
        else{
            return back()->with('error','Password should match');
        }

    }






    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');

    }



}
