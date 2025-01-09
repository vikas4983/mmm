<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\Religion;
use App\Models\State;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
  public function signUp()
  {
    return view('frontend.signup');
  }
  public function getCaste(Request $request)
  {
    $castes = Caste::whereIn('religion_id', $request->religions)->get();
    $religions = Religion::whereIn('id', $request->religions)->get();
   // return view('appendOptions', compact('castes', 'religions'));
     return response()->json([
      'castes' => $castes,
      'religions' => $religions,
    ]);
  }
  public function getCastes(Request $request)
  {
    $castes = Caste::whereIn('religion_id', $request->religions)->get();
    $religions = Religion::whereIn('id', $request->religions)->get();
    return view('ajaxOptions.appendCasteOptions', compact('castes', 'religions'));
    //  return response()->json([
    //   'castes' => $castes,
    //   'religions' => $religions,
    // ]);
  }

  public function getState(Request $request, $countryId)
  {
    $states = State::where('country_id', $countryId)->get();
    return response()->json($states);
  }
  public function getStates(Request $request)
  {
    $countries = Country::whereIn('id', $request->countries)->get();
    $states = State::whereIn('country_id', $request->countries)->get();
    return view('ajaxOptions.appendStateOptions', compact('countries','states'));
  }

  public function getCity(Request $request, $stateId)
  {
    $cities = City::where('state_id', $stateId)->get();

    return response()->json($cities);
  }
  public function getCities(Request $request)
  {
    $states = State::whereIn('id', $request->states)->get();
    $cities = City::whereIn('state_id', $request->states)->get();
    return view('ajaxOptions.appendCityOptions', compact('states','cities'));
    
  }




  public function getOccupation(Request $request, $employeeId)
  {
    $employees = Occupation::where('employee_id', $employeeId)->get();
    return response()->json($employees);
  }
}
