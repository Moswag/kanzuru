<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Council;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouncilController extends Controller
{
    public function addCouncil(){
        $cities=City::all();
        return view('admin.council.add_council',compact('cities'));
    }


    public function saveCouncil(Request $request){
        if(Council::where('name',$request->name)->exists()){
            return back()->with('error','Council already exists');
        }
        else{
            $council=new Council();
            $council->name=$request->name;
            $council->city=$request->city;

            if($council->save()){
                return redirect()->route('view_councils')->with('message','Council successfully added');
            }
            else{
                return back()->with('error','Failed to add council, please contact admin');
            }
        }
    }

    public function editCouncil($id){
        $cities=City::all();
        $council=Council::find($id);
        return view('admin.council.edit_council',compact('council','cities'));
    }

    public function updateCouncil(Request $request){
        if(Council::where('id',$request->id)->exists()){
            $updateCouncil=Council::where('id',$request->id)->update([
                'name'=>$request->name,
                'city'=>$request->city
            ]);

            if($updateCouncil){
                return redirect()->route('view_councils')->with('message','Council successfully updated');
            }
            else{
                return back()->with('error','Failed to update council, please contact admin');
            }

        }
        else{
            return back()->with('error','Council do not exists');
        }
    }


    public function viewCouncils(){
        $councils=Council::all();
        return view('admin.council.view_councils',compact('councils'));
    }


    public function deleteCouncil($id){
        if(Council::where('id',$id)->exists()){
            if(Council::find($id)->delete()){
                return back()->with('message','Council successfully deleted');
            }
            else{
                return back()->with('error','Failed to delete council');
            }
        }
    }
}
