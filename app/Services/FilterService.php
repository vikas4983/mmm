<?php

namespace App\Services;

use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\SearchGender;

class FilterService
{
    use SearchGender;

    public function filter($validatedData, $user)
    {
        $gender = $this->getGender($user);
        $photosId = $this->getPhoto($validatedData['photo'] ?? '');
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);
        $maritalStatusId = $this->getMaritalStatus($validatedData['marital_status'] ?? []);
        $religionsId = $this->getReligion($validatedData['religion'] ?? []);
        $castesId = $this->getCaste($validatedData['caste'] ?? []);
        $countriesId = $this->getCountry($validatedData['country'] ?? []);
        $statesId = $this->getState($validatedData['state'] ?? []);
        $citiesId = $this->getCity($validatedData['city'] ?? []);
        $minHeightId = (int) $validatedData['min_height'];
        $maxHeightId = (int) $validatedData['max_height'];
        $query = User::query()->where('gender', $gender);
        if ($validatedData['min_age'] && $validatedData['max_age'] && $validatedData['min_height'] && $validatedData['max_height']) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear, $minHeightId, $maxHeightId, $maritalStatusId, $religionsId, $castesId, $validatedData) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->whereBetween('height', [$minHeightId, $maxHeightId])
                    ->when(isset($validatedData['marital_status']), function ($q) use ($maritalStatusId) {
                        $q->whereIn('marital_status', $maritalStatusId);
                    })
                    ->when(isset($validatedData['religion']), function ($q) use ($religionsId) {
                        $q->whereIn('religion', $religionsId);
                    })
                    ->when(isset($validatedData['caste']), function ($q) use ($castesId) {
                        $q->whereIn('caste', $castesId);
                    });
            });
            $query->whereHas('carrierDetails', function ($query) use ($validatedData, $countriesId, $statesId, $citiesId) {
                $query
                    ->when(isset($validatedData['country']), function ($q) use ($countriesId) {
                        $q->whereIn('country', $countriesId);
                    })
                    ->when(isset($validatedData['state']), function ($q) use ($statesId) {
                        $q->whereIn('state', $statesId);
                    })
                    ->when(isset($validatedData['city']), function ($q) use ($citiesId) {
                        $q->whereIn('city', $citiesId);
                    });
            });
            $query->whereHas('images', function ($query) use ($photosId, $validatedData) {
                $query->when(isset($validatedData['photo']), function ($q) use ($photosId) {
                    $q->whereIn('id', $photosId);
                });
            });
        }
        return $query->latest()->get();
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
