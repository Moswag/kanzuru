<?php

namespace App\Http\Controllers;

use App\Location;
use App\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    function addResident(){
        $locations=Location::all();
        return view('admin.resident.add_resident',compact('locations'));
    }

    function saveResident(Request $request){
        $resident=new Resident();
        $resident->name=$request->name;
        $resident->national_id=$request->national_id;
        $resident->gender=$request->gender;
        $resident->phonenumber=$request->phonenumber;
        $resident->location=$request->location;
        $resident->house_number=$request->house_number;
        if($resident->save()){
            return redirect()->route('view_residents')->with('message','Resident successfully added');
        }
        else{
            return redirect()->back()->with('error','Failed to add Resident');
        }

    }

    function editResident($id){
        $resident=Resident::find($id);
        $locations=Location::all();
        return view('admin.resident.edit_resident',compact('resident','locations'));
    }

    function updateResident(Request $request){
        $res=Resident::where('id',$request->id)->update([
            'name'=>$request->name,
            'national_id'=>$request->national_id,
            'gender'=>$request->gender,
            'phonenumber'=>$request->phonenumber,
            'location'=>$request->location,
            'house_number'=>$request->house_number
            ]);
        if($res){
            return redirect()->route('view_residents')->with('message','Resident successfully updated');
        }
        else{
            return back()->with('error','Failed to update resident, please contact admin');
        }
    }

    function viewResidents(){
        $residents=Resident::all();
        return view('admin.resident.view_residents', compact('residents'));
    }


    function deleteResident($id){
        if(Resident::find($id)->delete()){
            return redirect()->route('view_residents')->with('message','Resident successfully deleted');
        }
    }




}
