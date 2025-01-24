<?php

namespace App\Http\Controllers;

use App\Http\Requests\searches\BasicFilterRequest;
use App\Http\Requests\searches\AdvanceFilterRequest;
use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Height;
use App\Models\Image;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\SearchGender;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;
use App\Services\FilterService;

class SearchController extends Controller
{
    use SearchGender;


    protected $optionService;
    protected $filterService;

   

    public function searchById(Request $request, OptionService $optionService,)
    {
        $options = $optionService->getOptions();

        $validatedData = $request->validate([
            'searchById' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        if (!$user) {
            session()->flash('error', 'Please login first!');
            $error = view('alerts.alert')->render();
            return response()->json([
                'alert' => $error,
            ]);
        }
        $gender = $this->getGender($user);
        $searchResults = User::where('matrimony_id', $validatedData['searchById'])
            ->where('gender', $gender)
            ->get();
        if (count($searchResults) > 0) {
            return view('frontend.search.searchResult', compact('searchResults', 'user', 'options'));
        } else {
            return redirect()->back()->with('error', 'User not found!');
        }
    }

    public function search(OptionService $optionService)
    {
        $options = $optionService->getOptions();
        $searchResults = '';
        $user = auth()->user();

        return view('frontend.search.quick', compact('options', 'searchResults', 'user'));
    }

    public function quickSearch(Request $request, OptionService $optionService)
    {
        $validatedData = $request->validate([
            'min_age' => 'required|integer',
            'max_age' => 'required|integer',
            'religion' => 'nullable|array',
            'religion.*' => 'integer',
            'caste' => 'nullable|array',
            'caste.*' => 'integer',
        ]);
        $options = $optionService->getOptions();
        $user = Auth::user();
        if (!$user) {
            return redirect()->with('error', 'Login first!');
            // session()->flash('error', 'Please login first!');
            // $error = view('alerts.alert')->render();
            // return response()->json(
            //     [
            //         'alert' => $error,
            //     ],
            //     404,
            // );
        }

        $gender = $this->getGender($user);
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);
        $religions = $this->getReligion($validatedData['religion'] ?? []);
        $castes = $this->getCaste($validatedData['caste'] ?? []);
        $query = User::query()->where('gender', $gender);

        if (!empty($validatedData['min_age'] && $validatedData['max_age']) && !empty($validatedData['religion']) && !empty($validatedData['caste'])) {
            $query->whereHas('basicDetails', function ($query) use ($religions, $castes, $minYear, $maxYear) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->when(!empty($religions), fn($q) => $q->whereIn('religion', $religions))
                    ->when(!empty($castes), fn($q) => $q->whereIn('caste', $castes));
            });
        } elseif (!empty($validatedData['min_age'] && $validatedData['max_age']) && !empty($validatedData['religion'])) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear, $religions) {
                $query->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])->when(!empty($religions), fn($q) => $q->whereIn('religion', $religions));
            });
        } elseif (!empty($validatedData['min_age']) && !empty($validatedData['min_max'])) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear) {
                $query->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"]);
            });
        }
        $searchResults = $query->with('basicDetails')->get();
        if ($searchResults->count() > 0) {
            if (session()->has('quickSearch')) {
                session()->forget('quickSearch');
            }
            session()->put('quickSearch', $validatedData);
            return view('components.search-result-component', compact('searchResults', 'options', 'user'));
        } else {
            return redirect()->back()->with('error', 'Result not found!');
        }
    }

    public function basicSearch(BasicFilterRequest $request, OptionService $optionService, FilterService $filterService)
    {
      
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            return redirect()->with('error', 'Login first!');
        }
        $options = $optionService->getOptions();
        $searchResults = $filterService->filter($validatedData, $user);
        if (count($searchResults) > 0) {
            return view('components.search-result-component', compact('searchResults', 'options', 'user'));
        } else {
            return redirect()->back()->with('error', 'Result not found!');
        }
    }
    public function advanceSearch(AdvanceFilterRequest $request, OptionService $optionService, FilterService $filterService)
    {
       
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            return redirect()->with('error', 'Login first!');
        }
        $options = $optionService->getOptions();
        $searchResults = $filterService->filter($validatedData, $user);

        if (count($searchResults) > 0) {
            return view('components.search-result-component', compact('searchResults', 'options', 'user'));
        } else {
            return redirect()->back()->with('error', 'Result not found!');
        }
    }

    public function searchResult()
    {
        return view('frontend.search.searchResult');
    }

    private function getMaritalStatus($maritalStatusId)
    {
        if ($maritalStatusId['0'] === '0') {
            $maritalStatus = MaritalStatus::all()->pluck('id')->toArray();
        } else {
            $maritalStatus = MaritalStatus::whereIn('id', $maritalStatusId)->pluck('id')->toArray();
           
        }
        return $maritalStatus;
    }
    private function getReligion($religionId)
    {
        $religions = Religion::whereIn('id', $religionId)->pluck('id')->toArray();

        return $religions;
    }

    private function getCaste($casteId)
    {
        $castes = Religion::whereIn('id', $casteId)->pluck('id')->toArray();
        return $castes;
    }
    private function getCountry($CountryId)
    {
        $countries = Country::whereIn('id', $CountryId)->pluck('id')->toArray();
        return $countries;
    }
    private function getState($stateId)
    {
        $states = State::whereIn('id', $stateId)->pluck('id')->toArray();
        return $states;
    }
    private function getCity($casteId)
    {
        $cities = City::whereIn('id', $casteId)->pluck('id')->toArray();
        return $cities;
    }

    private function getPhoto($requestPhoto)
    {
        $userId = Auth::user()->id;
        if ($requestPhoto === '1') {
            $photoIds = Image::with('user')->where('dp_image', 1)->where('user_id', '!=', $userId)->where('status', 1)->pluck('id')->toArray();
            return $photoIds;
        } else {
            $photos = Image::with('user')->where('user_id', '!=', $userId)->pluck('id')->toArray();
            return $photos;
        }
    }
    private function getMinMaxYear($minY, $maxY)
    {
        $currentYear = now()->year;
        $maxYear = $currentYear - intval($minY);
        $minYear = $currentYear - intval($maxY);

        return [$minYear, $maxYear];
    }
}
