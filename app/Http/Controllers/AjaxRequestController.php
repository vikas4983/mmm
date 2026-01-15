<?php

namespace App\Http\Controllers;

use App\Http\Requests\searches\BasicFilterRequest;
use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\Religion;
use App\Models\State;
use App\Services\filterCriterias\AdvanceFilterCriteria;
use App\Services\filterCriterias\BasicFilterCriteria;
use App\Services\filterCriterias\QuickFilterCriteria;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
  public function signUp()
  {
    return view('frontend.signup');
  }
  public function getCaste($religionId)
  {
    $religions = Religion::where('id', $religionId)->get();
    $castes = Caste::where('religion_id', $religionId)->get();

    $html =  view('ajaxOptions.appendCasteOptions', compact('castes', 'religions'))->render();

    return response()->json([
      'castes' => $html
    ]);
  }

  function getSelectedFilters(array $fields, array $advanceFilter): array
  {
    $result = [];
    foreach ($fields as $field) {
      $value = old($field, $advanceFilter[$field] ?? ['0']);
      if (is_string($value)) {
        $value = explode(',', $value);
      }
      $result[$field] = array_map('intval', (array) $value);
    }
    return $result;
  }
  public function getCastes(Request $request, QuickFilterCriteria $quickFilter, BasicFilterCriteria $basicFilter, AdvanceFilterCriteria $advanceFilter)
  {
    $request->validate([
      'ids' => 'required|array',
      'ids.*' => 'integer',
      'action' => 'sometimes|string',
      'filter' => 'sometimes|string',

    ]);

    $action = $request->action;
    $filter = $request->filter;
    $quickFilter = $quickFilter->quickFilter();
    $basicFilter = $basicFilter->basicFilter();
    $advanceFilter = $advanceFilter->advanceFilter();
    $advanceFilter = is_array($advanceFilter)
      ? $advanceFilter
      : ($advanceFilter ? $advanceFilter->toArray() : ['0']);

    $filterFields = ['min_age', 'max_age', 'min_height', 'max_height', 'religion', 'caste', 'marital_status', 'children', 'mother_tongue', 'country', 'state', 'city', 'income', 'education', 'occupation', 'profile_show', 'horoscope', 'manglik', 'family_status', 'physical_status', 'diet', 'drink', 'smoke', 'hiv'];
    $selectedAdvanceFilters = $this->getSelectedFilters($filterFields, $advanceFilter);

    $castes = Caste::whereIn('religion_id', $request->ids)->where('status', 1)->get();
    $religions = Religion::whereIn('id', $request->ids)->where('status', 1)->get();

    if (in_array(0, $request->ids)) {
      $data = ['0'];
      if (isset($request->action) && $request->action === 'sidebarFilter') {
        return response()->json([
          'data' => $data,
          'action' => 'casteData',
        ]);
      }
    }
    if (in_array(0, $request->ids) && $request->action === 'basicCasteCriteria') {
      return response()->json([
        'action' => 'hideCasteDiv'
      ]);
    }
    if (in_array(0, $request->ids) && $request->action === 'advanceCasteCriteria') {
      return response()->json([
        'action' => 'hideCasteDiv'
      ]);
    }

    if (isset($request->action) && $request->action === 'sidebarFilter') {

      $data =  view('ajaxOptions.sidebarFilter.castes', compact('castes', 'religions', 'basicFilter', 'quickFilter', 'selectedAdvanceFilters',))->render();
      return response()->json([
        'data' => $data,
        'action' => 'casteData',
      ]);
    }
    if (in_array(0, $request->ids) && $request->action === 'quickCasteCriteria') {
      return response()->json([
        'action' => 'hideQuickCaste',
      ]);
    }
    if (isset($request->action) && $request->action === 'quickCasteCriteria') {

      $data =  view('ajaxOptions.filterCriterias.quickFilterCriteria', compact('castes', 'religions', 'action', 'quickFilter'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'casteList',
      ]);
    }

    if (isset($request->action) && $request->action === 'basicCasteCriteria') {

      $data =  view('ajaxOptions.filterCriterias.basicFilterCriteria', compact('castes', 'religions', 'action', 'basicFilter'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'casteList',
      ]);
    }
    if (isset($request->action) && $request->action === 'advanceCasteCriteria') {

      $data =  view('ajaxOptions.filterCriterias.advanceFilterCriteria', compact('castes', 'religions', 'action', 'advanceFilter'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'advanceCasteList',
      ]);
    }


    return view('ajaxOptions.appendCasteOptions', compact('castes', 'religions', 'quickFilter'));
  }

  public function getState(Request $request, $countryId)
  {
    $states = State::where('country_id', $countryId)->where('status', 1)->get();
    return response()->json($states);
  }

  public function getStates(Request $request, BasicFilterCriteria $basicFilter, AdvanceFilterCriteria $advanceFilter)
  {

    $request->validate([
      'ids' => 'required|array',
      'ids.*' => 'integer',
      'action' => 'sometimes|string',

    ]);

    $action = $request->action;
    $basicFilter = $basicFilter->basicFilter();
    $advanceFilter = $advanceFilter->advanceFilter();
    $countries = Country::whereIn('id', $request->ids)->where('status', 1)->get();
    $states = State::whereIn('country_id', $request->ids)->where('status', 1)->get();
    if (in_array(0, $request->ids)) {
      $states = State::where('status', 1)->get();
      $countries = 1;
      $data =  view('ajaxOptions.sidebarFilter.allStates', compact('states'))->render();
      if (isset($request->action) && $request->action === 'sidebarFilter') {
        return response()->json([
          'data' => $data,
          'action' => 'stateData',
        ]);
      }
    }
    if (in_array(0, $request->ids) && $action === 'stateList') {
      $countries = [];
      $states = [];
      return response()->json([
        'action' => 'hide',
      ]);
    }

    if (isset($request->action) && $request->action === 'sidebarFilter') {
      $data =  view('ajaxOptions.sidebarFilter.states', compact('countries', 'states'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'stateData',
      ]);
    }
    if (isset($request->action) && $request->action === 'basicStateCriteria') {
      $data =  view('ajaxOptions.filterCriterias.basicFilterCriteria', compact('countries', 'states', 'basicFilter', 'action'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'stateList',
      ]);
    }

    if (isset($request->action) && $request->action === 'advanceStateCriteria') {
      $data =  view('ajaxOptions.filterCriterias.advanceFilterCriteria', compact('countries', 'states', 'advanceFilter', 'action'))->render();
      return response()->json([
        'advanceState' => $data,
        'action' => 'advanceStateList',
      ]);
    }

    if (isset($request->action) && $request->action === 'stateList') {
      $data =  view('ajaxOptions.appendStateOptions', compact('countries', 'states'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'stateList',
      ]);
    }
    return view('ajaxOptions.appendStateOptions', compact('countries', 'states'));
  }

  public function getCity(Request $request, $stateId)
  {
    $cities = City::where('state_id', $stateId)->get();

    return response()->json($cities);
  }
  public function getCities(Request $request, BasicFilterCriteria $basicFilter, AdvanceFilterCriteria $advanceFilter)
  {

    $request->validate([
      'ids' => 'required|array',
      'ids.*' => 'integer',
      'action' => 'sometimes|string',

    ]);
    $action = $request->action;
    $basicFilter = $basicFilter->basicFilter();
    $advanceFilter = $advanceFilter->advanceFilter();

    $states = State::whereIn('id', $request->ids)->where('status', 1)->get();
    $cities = City::whereIn('state_id', $request->ids)->where('status', 1)->get();

    if (in_array(0, $request->ids)) {
      $data =  view('ajaxOptions.sidebarFilter.cities', compact('states', 'cities'))->render();
      if (isset($request->action) && $request->action === 'sidebarFilter') {
        return response()->json([
          'data' => $data,
          'action' => 'stateData',
        ]);
      }
    }
    if (isset($request->action) && $request->action === 'cityList') {
      $data =  view('ajaxOptions.appendCityOptions', compact('states', 'cities'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'cityList',
      ]);
    }
    if (isset($request->action) && $request->action === 'sidebarFilter') {
      $data =  view('ajaxOptions.sidebarFilter.cities', compact('states', 'cities', 'basicFilter'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'cityData',
      ]);
    }
    // if (in_array(0, $request->action) && $request->action === 'basicCityCriteria') {
    //   return response()->json([
    //     'action' => 'hideBasicCity',
    //   ]);
    // }
    if (isset($request->action) && $request->action === 'basicCityCriteria') {
      $data =  view('ajaxOptions.filterCriterias.basicFilterCriteria', compact('states', 'cities', 'basicFilter', 'action'))->render();
      return response()->json([
        'data' => $data,
        'action' => 'cityList',
      ]);
    }

    if (in_array(0, $request->ids) && $request->action === 'advanceCityCriteria') {
      return response()->json([
        'action' => 'hideAdvanceCity',
      ]);
    }
    if (isset($request->action) && $request->action === 'advanceCityCriteria') {
      $data =  view('ajaxOptions.filterCriterias.advanceFilterCriteria', compact('states', 'cities', 'advanceFilter', 'action'))->render();
      return response()->json([
        'advanceCity' => $data,
        'action' => 'advanceCityList',
      ]);
    }

    return view('ajaxOptions.appendCityOptions', compact('states', 'cities'));
  }




  public function getOccupation(Request $request, $employeeId)
  {
    $employees = Occupation::where('employee_id', $employeeId)->where('status', 1)->get();
    return response()->json($employees);
  }
}
