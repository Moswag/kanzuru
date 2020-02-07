<?php

namespace App\Http\Controllers\Client;

use App\AppConstants;
use App\Compalaints;
use App\Http\Controllers\Controller;
use App\Location;
use App\Resident;
use App\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    function complain(){
        return view('resident.complain.add_complain');
    }

    function saveComplaint(Request $request){
        $complaint=new Compalaints();
        $resident=Resident::where('user_id',auth()->user()->id)->first();
        $complaint->res_id=$resident->id;
        $complaint->complain=$request->description;
        $complaint->status=AppConstants::STATUS_PENDING;
        if($complaint->save()){
            return redirect()->route('view_complaints')->with('message','Compain successfuly submitted');
        }
        else{
            return back()->with('error','Failed to add complain');
        }
    }

    public function viewResidentCompaints(){
        $resident=Resident::where('user_id',auth()->user()->id)->first();
        $complaints=Compalaints::where('res_id',$resident->id)->get();
        return view('resident.complain.view_complaints',compact('complaints'));
    }


}
