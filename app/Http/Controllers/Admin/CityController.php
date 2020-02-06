<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    function addCity(){
        return view('admin.city.add_city');
    }

    function saveCity(Request $request){
        if(City::where('name',$request->name)->exists()){
            return back()->with('error','City already exists');
        }
        else{
            $city=new City();
            $city->name=$request->name;

            if($city->save()){
                return redirect()->route('view_cities')->with('message','City successfully added');
            }
            else{
                return back()->with('error','Failed to add city');
            }
        }
    }

    public function editCity($id){
        $city=City::find($id);
        return view('admin.city.edit_city', compact('city'));
    }

    public function updateCity(Request $request){
        if(City::where('id',$request->id)->exists()){
            $updateCity=City::where('id',$request->id)->update([
                'name'=>$request->name
            ]);


            if($updateCity){
                return redirect()->route('view_cities')->with('message','City successfully updated');
            }
            else{
                return back()->with('error','Failed to add city');
            }

        }
        else{
            return back()->with('error','City do not exists');
        }
    }

    function viewCities(){
        $cities=City::all();
        return view('admin.city.view_cities', compact('cities'));
    }

    function deleteCity($id){
        if(City::where('id',$id)->exists()){
            if(City::find($id)->delete()){
                return back()->with('message','City successfully deleted');
            }
            else{
                return back()->with('error','Failed to delete city');
            }
        }
        else{
            return back()->with('error','City with that id can not be found');
        }
    }
}
