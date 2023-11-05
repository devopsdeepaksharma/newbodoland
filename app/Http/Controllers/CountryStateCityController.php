<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\{Country,MyStates,MyCities};
 
class CountryStateCityController extends Controller
{
 
    public function index()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('country-state-city',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = MyState::get(["name","id"]);
        return view('csoregistrationform',$data);
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        dd($request->state_id);
        $data['cities'] = MyCities::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
 
}