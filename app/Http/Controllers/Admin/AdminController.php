<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\AppConstants;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function addAdmin()
    {
        return view('admin.admin.add_admin');
    }

    function saveAdmin(Request $request)
    {
        if (User::where('username', $request->employee_num)->exists()) {
            return redirect()->route('add_admin')->with('message', 'Admin already exists');
        } else {
            $user = new User();
            $user->name = $request->name . ' ' . $request->surname;
            $user->username = $request->employee_num;
            $user->isFirstTime = true;
            $user->status = AppConstants::STATUS_ACTIVE;
            $user->access = AppConstants::ACCESS_ADMIN;
            $user->password = bcrypt(AppConstants::DEFAULT_PASSWORD);

            if ($user->save()) {
                $admin = new Admin();
                $admin->user_id=$user->id;
                $admin->name = $request->name;
                $admin->surname = $request->surname;
                $admin->phonenumber = $request->phonenumber;
                $admin->employee_num = $request->employee_num;
                if ($admin->save()) {
                    return redirect()->route('view_admins')->with('message', 'Admin successfully added');
                } else {
                    return back()->with('message', 'Failed to add admin, please contact admin');
                }
            } else {
                return back()->with('error', 'Failed to add user');
            }


        }
    }

    function editAdmin($id){
        $admin=Admin::find($id);
        return view('admin.admin.edit_admin', compact('admin'));
    }

    function updateAdmin(Request $request)
    {
        $loggedAdmin=Admin::find($request->id);
        if (User::where('username', $loggedAdmin->employee_num)->exists()) {
            $updateUser = User::where('username', $loggedAdmin->employee_num)->update([
                'name'=>$request->name . ' ' . $request->surname,
                'username'=>$request->employee_num
            ]);


            if ($updateUser) {
                $updateAdmin = Admin::where('id',$request->id)->update([
                    'name'=>$request->name,
                    'surname'=>$request->surname,
                    'phonenumber'=>$request->phonenumber,
                    'employee_num'=>$request->employee_num
                ]);
                if ($updateAdmin) {
                    return redirect()->route('view_admins')->with('message', 'Admin successfully updated');
                } else {
                    return back()->with('message', 'Failed to update admin, please contact admin');
                }
            } else {
                return back()->with('error', 'Failed to update user');
            }


        }
        else{
            return redirect()->route('add_admin')->with('message', 'Admin already exists');
        }

    }

    function viewAdmins()
    {
        $admins = Admin::where('id', '<>', auth()->user()->id)->get();
        return view('admin.admin.view_admins', compact('admins'));
    }

    function deleteAdmin($id)
    {
        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::where('id', $id)->first();
            if (User::find($admin->user_id)->delete()) {
                if (Admin::find($id)->delete()) {
                    return back()->with('message', 'Admin successfully deleted');
                } else {
                    return back()->with('error', 'Failed to delete admin');
                }
            } else {
                return back()->with('error', 'Failed to delete user');
            }
        }
    }
}
