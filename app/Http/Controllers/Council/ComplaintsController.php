<?php

namespace App\Http\Controllers\Council;

use App\Compalaints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintsController extends Controller
{
    public function viewComplaints(){
        $complaints=Compalaints::where('status','Pending')->get();
        return view('council.complain.view_complaints', compact('complaints'));
    }

    public function viewSolvedComplaints(){
        $complaints=Compalaints::where('status','Resolved')->get();
        return view('council.complain.view_resolved_complaints', compact('complaints'));
    }

    public function updateComplaint($id){
        $updateCompalin=Compalaints::where('id',$id)->update([
            'status'=>'Resolved'
        ]);
        if($updateCompalin){
            return redirect()->route('view_complaints')->with('message','Complain successfully updated');
        }
        else{
            return back()->with('error','Failed to update complain');
        }
    }
}
