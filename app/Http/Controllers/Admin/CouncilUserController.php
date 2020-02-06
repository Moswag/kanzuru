<?php

namespace App\Http\Controllers\Admin;

use App\AppConstants;
use App\Council;
use App\CouncilUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CouncilUserController extends Controller
{
    function addUser()
    {
        $councils=Council::all();
        return view('admin.user.add_user',compact('councils'));
    }

    function saveUser(Request $request)
    {
        if (User::where('username', $request->employee_id)->exists()) {
            return back()->with('error', 'User already exists');

        } else {
            $user = new User();
            $user->username = $request->employee_id;
            $user->name = $request->name;
            $user->access = AppConstants::ACCESS_COUNCIL;
            $user->status = AppConstants::STATUS_ACTIVE;
            $user->isFirstTime=true;
            $user->password = bcrypt(AppConstants::DEFAULT_PASSWORD);

            if ($user->save()) {
                $councilUser = new CouncilUser();
                $councilUser->user_id = $user->id;
                $councilUser->council_id = $request->council;
                $councilUser->name = $request->name;
                $councilUser->surname = $request->surname;
                $councilUser->employee_id = $request->employee_id;
                $councilUser->phonenumber = $request->phonenumber;
                $councilUser->status = AppConstants::STATUS_ACTIVE;

                if ($councilUser->save()) {
                    return redirect()->route('view_users')->with('message', 'Council user successfully added');
                } else {
                    return back()->with('error', 'Failed to add council user, please contact admin');
                }
            }

        }

    }

    public function editUser($id){
        $user=CouncilUser::find($id);
        $councils=Council::all();
        return view('admin.user.edit_user',compact('user','councils'));
    }

    public function updateUser(Request $request){
        $changedUser=CouncilUser::find($request->id);
        if (User::where('id', $changedUser->user_id)->exists()) {
            $updateUser = User::where('id',$changedUser->user_id)->update([
                'username'=>$request->employee_id,
                'name'=>$request->name
            ]);
            if($updateUser){
                $updatecouncilUser = CouncilUser::where('id',$request->id)->update([
                    'council_id'=>$request->council,
                    'name'=>$request->name,
                    'surname'=>$request->surname,
                    'employee_id'=>$request->employee_id,
                    'phonenumber'=>$request->phonenumber

                ]);

                if ($updatecouncilUser) {
                    return redirect()->route('view_users')->with('message', 'Council user successfully updated');
                } else {
                    return back()->with('error', 'Failed to update council user, please contact admin');
                }
            }
            else{
                return back()->with('error', 'Failed to update user');
            }


        } else {
            return back()->with('error', 'User do not exists, please contact admin');
        }
    }

    public function viewUsers(){
        $users=CouncilUser::all();
        return view('admin.user.view_users',compact('users'));
    }

    public function deleteUser($id){
        if(CouncilUser::where('id',$id)->exists()){
            $cUser=CouncilUser::find($id);
            if(User::find($cUser->user_id)->delete()){
                if(CouncilUser::find($id)->delete()){
                    return redirect()->route('view_users')->with('message','Council user successfully deleted');
                }
                else{
                    return back()->with('error','Failed to delete council user, please contact admin');
                }
            }
            else{
                return back()->with('error','Could not delete user, please contact admin ');
            }
        }
        else{
            return back()->with('error','Sorry, a user with that Id can not be found, please contact admin');
        }
    }
}
