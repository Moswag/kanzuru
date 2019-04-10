<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    function index(){
        return view('admin.add_resident');
    }

    function addResident(Request $request){
        $resident=new Resident();
        $resident->name=$request->name;
        $resident->houseNumber=$request->houseNumber;
        $resident->gender=$request->gender;
        $resident->phonenumber=$request->phonenumber;
        $resident->location=$request->location;
        if($request->save()){
            return redirect()->route('view_residents')->with('message','Resident successfully added');
        }
        else{
            return redirect()->back()->with('error','Failed to add Resident');
        }

    }

    function updateResident(Request $request,$id){
        $res=Resident::where('id',$id)->update([
            'name'=>$request->name,
            'houseNumber'=>$request->houseNumber,
            'gender'=>$request->gender,
            'location'=>$request->location
            ]);
        if($res){
            return redirect()->route('view_residents')->with('message','Resident successfully updated');
        }
    }

    function viewResidents(){
        $residents=Resident::all();
        return view('admin.view_residents', compact('residents'));
    }


    function deleteResident($id){
        if(Resident::find($id)->delete()){
            return redirect()->route('view_residents')->with('message','Resident successfully deleted');
        }
    }




}
