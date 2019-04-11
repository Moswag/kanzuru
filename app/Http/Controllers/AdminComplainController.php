<?php

namespace App\Http\Controllers;

use App\Compalaints;
use Illuminate\Http\Request;

class AdminComplainController extends Controller
{
    function viewComplaints(){
        $complaints=Compalaints::where('status','pending')->get();
        return view('admin.complaints.view_complaints',compact('complaints'));
    }

    function viewSolvedComplaints(){
        $complaints=Compalaints::where('status','resolved')->get();
        return view('admin.complaints.view_solved_complaints',compact('complaints'));
    }

    function editComplaint($id){
        $complaint=Compalaints::find($id);
        return view('admin.complaints.edit_complaint',compact('complaint'));
    }

    function updateComplaint(Request $request){
        $complain=Compalaints::where('id',$request->id)->update([
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
