<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function addLocation(){
        return view('admin.location.add_location');
    }

    function saveLocation(Request $request){
        $location=new Location();
        $location->name=$request->name;
        $location->addBy=auth()->user()->employee_id;
        if($location->save()){
            return redirect()->route('view_locations')->with('message','Location successfully added');
        }
        else{
            return redirect()->back()->with('error','Failed to add location');
        }
    }

    function viewLocations(){
        $locations=Location::all();
        return view('admin.location.view_locations',compact('locations'));
    }

    function editLocation($id){
        $location=Location::find($id);
        return view('admin.location.edit_location',compact('location'));

    }

    function updateLocation(Request $request){
        $location=Location::where('id',$request->id)->update([
            'name'=>$request->name,
            'addBy'=>auth()->user()->employee_id
        ]);
        if($location){
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
