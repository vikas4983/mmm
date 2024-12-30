<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\SearchGender;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;

class SearchController extends Controller
{
    use SearchGender;

    protected $optionService;

    public function searchById(Request $request, OptionService $optionService)
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
            session()->flash('error', 'Please login first!');
            $error = view('alerts.alert')->render();
            return response()->json(
                [
                    'alert' => $error,
                ],
                404,
            );
        }

        $gender = $this->getGender($user);
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);

        $religions = $this->getReligion($validatedData['religion'] ?? []);
        $castes = $this->getCaste($validatedData['caste'] ?? []);
        $query = User::query()->where('gender', $gender);

        if (!empty($minYear) && !empty($maxYear) && !empty($religions) && !empty($castes)) {
            $query->whereHas('basicDetails', function ($query) use ($religions, $castes, $minYear, $maxYear) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->when(!empty($religions), fn($q) => $q->whereIn('religion', $religions))
                    ->when(!empty($castes), fn($q) => $q->whereIn('caste', $castes));
            });
        } elseif (!empty($minYear) && !empty($maxYear)) {
            dd('age');
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear) {
                $query->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"]);
            });
        } elseif (!empty($minYear) && !empty($maxYear) && !empty($religions)) {
            dd('age+religion');
            $query->whereHas('basicDetails', function ($query) use ($religions, $minYear, $maxYear) {
                $query->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])->whereIn('religion', $religions);
            });
        }
        $searchResults = $query->with('basicDetails')->get();

        if ($searchResults->count() > 0) {
            if(session()->has('quickSearch')){
               session()->forget('quickSearch');
            }
            session()->put('quickSearch', $validatedData);
            return view('components.search-result-component', compact('searchResults', 'options', 'user'));
        } else {
            return response()->json(['message' => 'No results found'], 404);
        }
    }
    public function searchResult()
    {
        return view('frontend.search.searchResult');
    }

    private function getReligion($religionId)
    {
        $religions = Religion::whereIn('id', $religionId)->pluck('id');
        return $religions;
    }
    private function getCaste($casteId)
    {
        $castes = Religion::whereIn('id', $casteId)->pluck('id');
        return $castes;
    }
    private function getMinMaxYear($minY, $maxY)
    {
        $currentYear = now()->year;
        $maxYear = $currentYear - intval($minY);
        $minYear = $currentYear - intval($maxY);

        return [$minYear, $maxYear];
    }
}
