<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuickSearchFilterRequest;
use App\Http\Requests\searches\BasicFilterRequest;
use App\Http\Requests\searches\AdvanceFilterRequest;
use App\Http\Requests\sidebarFilter\ReligionRequest;
use App\Http\Requests\sidebarFilter\SidebarFilterRequest;
use App\Models\AdvanceSearch;
use App\Models\BasicSearch;
use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Height;
use App\Models\Image;
use App\Models\MaritalStatus;
use App\Models\QuickSearch;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use App\Services\filterCriterias\AdvanceFilterCriteria;
use App\Services\filterCriterias\BasicFilterCriteria;
use App\Services\filterCriterias\QuickFilterCriteria;
use Illuminate\Http\Request;
use App\Traits\SearchGender;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;
use App\Services\FilterService;
use App\Services\sidebarFilterService;
use App\Traits\UserBlockTrait;
use App\Traits\UserStatusTrait;

class SearchController extends Controller
{
    use SearchGender;
    use UserBlockTrait;
    use UserStatusTrait;

    protected $optionService;
    protected $filterService;
    protected $sidebarFilterService;

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
    public function search(OptionService $optionService, QuickFilterCriteria $quickFilter, BasicFilterCriteria $basicFilter, AdvanceFilterCriteria $advanceFilter,)
    {
        $options = $optionService->getOptions();
        $quickFilter = $quickFilter->quickFilter();
        $basicFilter = $basicFilter->basicFilter();
        $advanceFilter = $advanceFilter->advanceFilter();
        $advanceFilter = is_array($advanceFilter)
            ? $advanceFilter
            : ($advanceFilter ? $advanceFilter->toArray() : ['0']);
        $searchResults = '';
        $filterFields = ['min_age', 'max_age', 'min_height', 'max_height', 'religion', 'caste', 'marital_status', 'children', 'mother_tongue', 'country', 'state', 'city', 'income', 'education', 'occupation', 'profile_show', 'horoscope', 'manglik', 'family_status', 'physical_status', 'diet', 'drink', 'smoke', 'hiv'];
        $selectedAdvanceFilters = $this->getSelectedFilters($filterFields, $advanceFilter);

        $user = auth()->user();
        return view('frontend.search.search', compact('options', 'searchResults', 'user', 'quickFilter', 'basicFilter', 'selectedAdvanceFilters'));
    }

    public function quickSearchCriteria($validatedData)
    {
        $userId = Auth::user()->id;
        if ($validatedData) {
            if (isset($validatedData['religion']) && is_array($validatedData['religion'])) {
                $validatedData['religion'] = implode(',', $validatedData['religion']);
            }

            if (isset($validatedData['caste']) && is_array($validatedData['caste'])) {
                $validatedData['caste'] = implode(',', $validatedData['caste']);
            }
            QuickSearch::updateOrCreate(
                ['user_id' => $userId],
                $validatedData
            );
        }
    }
    public function basicSearchCriteria($validatedData)
    {
        $userId = Auth::user()->id;
        if ($validatedData) {
            foreach (['marital_status', 'children', 'religion', 'caste', 'country', 'state', 'city', 'profile_show'] as $field) {
                if (isset($validatedData[$field]) && is_array($validatedData[$field])) {
                    $validatedData[$field] = implode(',', $validatedData[$field]);
                }
            }
            BasicSearch::updateOrCreate(
                ['user_id' => $userId],
                $validatedData
            );
        }
    }
    public function advanceSearchCriteria($validatedData)
    {
        $userId = Auth::user()->id;
        if ($validatedData) {
            foreach (
                [
                    'religion',
                    'caste',
                    'marital_status',
                    'children',
                    'mother_tongue',
                    'photo',
                    'horoscope',
                    'manglik',
                    'country',
                    'state',
                    'city',
                    'income',
                    'education',
                    'occupation',
                    'family_status',
                    'physical_status',
                    'diet',
                    'drink',
                    'smoke',
                    'hiv'
                ] as $field
            ) {
                if (isset($validatedData[$field]) && is_array($validatedData[$field])) {
                    $validatedData[$field] = implode(',', $validatedData[$field]);
                }
            }
            AdvanceSearch::updateOrCreate(
                ['user_id' => $userId],
                $validatedData
            );
        }
    }

    public function quickSearch(QuickSearchFilterRequest $request, OptionService $optionService)
    {

        $validatedData = $request->validated();
        $options = $optionService->getOptions();
        $user = Auth::user();
        if (!$user) {
            return redirect()->with('error', 'Login first!');
        }
        $gender = $this->getGender($user);
        $blockedIds =  $this->userBlock($user);
        $userStatusIds = $this->userStatus();
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);
        $religions = $this->getReligion($validatedData['religion'] ?? []);
        $castes = $this->getCaste($validatedData['caste'] ?? []);
        $query = User::query()->where('gender', $gender)->where('status', 1)->orderBy('id', 'desc');
        if (!empty($blockedIds)) {
            $query->whereNotIn('id', $blockedIds);
        }
        if (!empty($userStatusIds)) {
            $query->whereNotIn('id', $userStatusIds);
        }

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
        $count = $query->with('basicDetails');
        $searchResults = $query->with('basicDetails')->latest()->paginate(1)->withQueryString();
        
        if ($searchResults->count() > 0) {
            $this->quickSearchCriteria($validatedData);
            return view('components.search-result-component', compact('searchResults', 'validatedData', 'options', 'user','count'));
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

        $count = $filterService->filter($validatedData, $user)->get();
        $searchResults = $filterService->filter($validatedData, $user)->latest()->paginate(1)->withQueryString();

        if (count($searchResults) > 0) {
            $this->basicSearchCriteria($validatedData);
            return view('components.search-result-component', compact('searchResults', 'validatedData', 'options', 'user', 'count'));
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
        $count = $filterService->filter($validatedData, $user)->get();
        $searchResults = $filterService->filter($validatedData, $user)->latest()->paginate(1)->withQueryString();

        if (count($searchResults) > 0) {
            $this->advanceSearchCriteria($validatedData);

            return view('components.search-result-component', compact('searchResults', 'validatedData', 'options', 'user', 'count'));
        } else {
            return redirect()->back()->with('error', 'Result not found!');
        }
    }

    public function sidebarFilter(SidebarFilterRequest $request, OptionService $optionService,  sidebarFilterService $sidebarFilterService,)
    {
        $validatedData = $request->validated();
        $user = Auth::user();

        if (!$user) {
            return redirect()->with('error', 'Login first!');
        }
        $searchResults = $sidebarFilterService->sidebarFilter($validatedData, $user)->sortByDesc('id');
        $count = $searchResults->count();
        if (count($searchResults) > 0) {
            if ($request->ajax()) {
                $html = view('components.profile-card-component', compact('searchResults'))->render();
                return response()->json([
                    'html' => $html,
                    'count' => $count,
                ]);
            }
        } else {
            if ($request->ajax()) {
                $html = view('components.no-data.no-data-found-component')->render();
                return response()->json([
                    'html' => $html,
                    'count' => $count,
                ]);
            }
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
