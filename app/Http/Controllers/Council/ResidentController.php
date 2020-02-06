<?php

namespace App\Http\Controllers\Council;

use App\AppConstants;
use App\City;
use App\Council;
use App\CouncilUser;
use App\Http\Controllers\Controller;
use App\Location;
use App\Resident;
use App\ResidentAccount;
use App\User;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    function addResident(){
        $user=CouncilUser::where('user_id',auth()->user()->id)->first();
        $council=Council::find($user->council_id);
        $city=City::find($council->city);
        $locations=Location::where('city',$city->id)->get();
        return view('council.resident.add_resident',compact('locations'));
    }

    function saveResident(Request $request){
        if(Resident::where([['house_number',$request->house_number],['location_id',$request->location]])->exists()){
            return back()->with('error','House number already registered, please contact admin');
        }
        else {
            if (User::where('username', $request->national_id.''.$request->house_number)->exists()) {
                return back()->with('error','User with that Id already registered');
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->username = $request->national_id.''.$request->house_number;
                $user->isFirstTime = true;
                $user->status = AppConstants::STATUS_ACTIVE;
                $user->access = AppConstants::ACCESS_RESIDENT;
                $user->password = bcrypt(AppConstants::DEFAULT_PASSWORD);

                if ($user->save()) {
                    $resident = new Resident();
                    $resident->user_id = $user->id;
                    $resident->name = $request->name;
                    $resident->national_id = $request->national_id;
                    $resident->gender = $request->gender;
                    $resident->phonenumber = $request->phonenumber;
                    $resident->location_id = $request->location;
                    $resident->house_number = $request->house_number;
                    if ($resident->save()) {
                        $account = new ResidentAccount();
                        $account->res_id = $resident->id;
                        $account->balance = '0';
                        $account->status = AppConstants::STATUS_DISABLED;
                        if ($account->save()) {
                            return redirect()->route('view_residents')->with('message', 'Resident successfully added');
                        } else {
                            return back()->with('error', 'Failed to add account');
                        }

                    } else {
                        return redirect()->back()->with('error', 'Failed to add Resident');
                    }
                } else {
                    return redirect()->back()->with('error', 'Failed to add User, please contact admin');
                }
            }
        }

    }

    function editResident($id){
        $resident=Resident::find($id);
        $user=CouncilUser::where('user_id',auth()->user()->id)->first();
        $council=Council::find($user->council_id);
        $city=City::find($council->city);
        $locations=Location::where('city',$city->id)->get();
        return view('council.resident.edit_resident',compact('resident','locations'));
    }

    function updateResident(Request $request){
        $reqResident=Resident::find($request->id);
        if(Resident::where([['house_number',$request->house_number],['location_id',$request->location],['user_id','<>',$reqResident->user_id]])->exists()){
            return back()->with('error','House number already registered to another resident, please contact admin');
        }
        else {
            if (User::where([['username', $request->national_id.''.$request->house_number],['id','<>',$reqResident->user_id]])->exists()) {
                return back()->with('error','User with that Id already registered');
            } else {
                $updateUser = User::where('id',$reqResident->user_id)->update([
                    'name'=>$request->name,
                    'username'=>$request->national_id.''.$request->house_number
                ]);


                if ($updateUser) {
                    $updateResident = Resident::where('id',$request->id)->update([
                        'name'=>$request->name,
                        'national_id'=>$request->national_id,
                        'gender'=>$request->gender,
                        'phonenumber'=>$request->phonenumber,
                        'location_id'=>$request->location,
                        'house_number'=>$request->house_number
                    ]);

                    if ($updateResident) {
                            return redirect()->route('view_residents')->with('message', 'Resident successfully updated');

                    } else {
                        return redirect()->back()->with('error', 'Failed to update Resident');
                    }
                } else {
                    return redirect()->back()->with('error', 'Failed to update User, please contact admin');
                }
            }
        }
    }

    public function viewResidents(){
        $residents=Resident::all();
        return view('council.resident.view_residents', compact('residents'));
    }


    function deleteResident($id){
        if(Resident::find($id)->delete()){
            return redirect()->route('view_residents')->with('message','Resident successfully deleted');
        }
    }




}
