<?php

namespace App\Http\Controllers\Client;

use App\Compalaints;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    function complain(){
        $locations=Location::all();
        return view('complain.add_complain',compact('locations'));
    }

    function saveComplaint(Request $request){
        $complaint=new Compalaints();
        $complaint->name=$request->name;
        $complaint->phonenumber=$request->phonenumber;
        $complaint->complain=$request->complain;
        $complaint->location=$request->location;
        $complaint->status='pending';
        if($complaint->save()){
            return redirect()->route('complain')->with('message','Compain successfuly submitted');
        }
        else{
            return back()->with('error','Failed to add complain');
        }
    }


}
