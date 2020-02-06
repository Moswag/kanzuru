<?php

namespace App\Http\Controllers\Council;

use App\Admin;
use App\City;
use App\Council;
use App\CouncilUser;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function addLocation(){
        $user=CouncilUser::where('user_id',auth()->user()->id)->first();
        $council=Council::find($user->council_id);
        $city=City::find($council->city);

        return view('council.location.add_location', compact('city'));
    }

    function saveLocation(Request $request){
        if(Location::where([['name',$request->name],['city',$request->city]])->exists()){
            return back()->with('error','Location for that city already exists');
        }
        else {
            $location = new Location();
            $location->name = $request->name;
            $location->city=$request->city;
            $location->addBy = auth()->user()->username;
            if ($location->save()) {
                return redirect()->route('view_locations')->with('message', 'Location successfully added');
            } else {
                return redirect()->back()->with('error', 'Failed to add location');
            }
        }
    }

    function viewLocations(){
        $user=CouncilUser::where('user_id',auth()->user()->id)->first();
        $council=Council::find($user->council_id);
        $city=City::find($council->city);
        $locations=Location::where('city',$city->id)->get();
        return view('council.location.view_locations',compact('locations'));
    }

    function editLocation($id){
        $user=CouncilUser::where('user_id',auth()->user()->id)->first();
        $council=Council::find($user->council_id);
        $city=City::find($council->city);
        $location=Location::find($id);
        return view('council.location.edit_location',compact('location','city'));

    }

    function updateLocation(Request $request){
        $updateLocation=Location::where('id',$request->id)->update([
            'name'=>$request->name,
            'addBy'=>auth()->user()->username
        ]);
        if($updateLocation){
            return redirect()->route('view_locations')->with('message','Location successfully updated');
        }
        else{
            return redirect()->back()->with('error','Failed to edit location');
        }
    }

    function deleteLocation($id){
        if(Location::find($id)->delete()){
            return redirect()->route('view_locations')->with('message','Location successfully deleted');
        }
        else{
            return redirect()->back()->with('error','Failed to delete location');
        }
    }
}
