<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\City;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\State;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function signUp(){
       
      return view('frontend.signup');
    }
    public function getCaste(Request $request, $religionId){
       
        $castes = Caste::where('religion_id', $religionId)->get();
        return response()->json($castes);
    }

    public function getState(Request $request, $countryId){
       
        $states = State::where('country_id', $countryId)->get();
        return response()->json($states);
    }
    public function getCity(Request $request, $stateId){
      
      $cities = City::where('state_id', $stateId)->get();
       return response()->json($cities);
    }
    public function getOccupation(Request $request, $employeeId){
     
      $employees = Occupation::where('employee_id', $employeeId)->get();
       return response()->json($employees);
    }
}
