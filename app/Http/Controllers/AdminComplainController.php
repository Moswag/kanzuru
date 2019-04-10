<?php

namespace App\Http\Controllers;

use App\Compalaints;
use Illuminate\Http\Request;

class AdminComplainController extends Controller
{
    function viewComplaints(){
        $complaints=Compalaints::all();
        return view('admin.view_complaints',compact('complaints'));
    }

    function updateComplain(Request $request,$id){
        $complain=Compalaints::where('id',$id)->update([
           'status'=>$request->status
        ]);

        if($complain){
            return redirect()->route('view_complaints')->with('message','Complain successfully updated');
        }
        else{
            return back()->with('error','Failed to update complain');
        }
    }
}
