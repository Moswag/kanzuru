<?php

namespace App\Http\Controllers;

use App\Compalaints;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    function index(){
        return view('residents.add_complaint');
    }

    function addComplaint(Request $request){
        $complaint=new Compalaints();
        $complaint->phonenumber=$request->phonenumber;
        $complaint->complain=$request->complain;
        $complaint->location=$request->location;
        if($complaint->save()){
            return redirect()->route('add_complaint')->with('message','Compain successfuly submitted');
        }
        else{
            return back()->with('error','Failed to add complain');
        }
    }


}
