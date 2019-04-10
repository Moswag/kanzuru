<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function index(){
        return view('admin.add_location');
    }

    function addLocation(Request $request){
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
        return view('view_locations',compact('locations'));
    }

    function editLocation(Request $request,$id){
        $location=Location::where('id',$id)->update([
            'name'=>$request->name,
            'addedBy'=>auth()->user()->employee_id
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
