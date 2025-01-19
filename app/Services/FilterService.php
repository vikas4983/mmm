<?php

namespace App\Services;

use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use App\Models\MotherTongue;
use App\Models\Income;
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
        $childrenId = $this->getMaritalStatus($validatedData['children'] ?? []);
        dump( $childrenId);
        $motherTongueId = $this->getMotherTongue($validatedData['mother_tongue'] ?? []);
        $incomeId = $this->getIncome($validatedData['income'] ?? []);
        $religionsId = $this->getReligion($validatedData['religion'] ?? []);
        $castesId = $this->getCaste($validatedData['caste'] ?? []);
        $countriesId = $this->getCountry($validatedData['country'] ?? []);
        $statesId = $this->getState($validatedData['state'] ?? []);
        $citiesId = $this->getCity($validatedData['city'] ?? []);
        $minHeightId = (int) $validatedData['min_height'];
        $maxHeightId = (int) $validatedData['max_height'];
        $query = User::query()->where('gender', $gender);

        if ($validatedData['min_age'] && $validatedData['max_age'] && $validatedData['min_height'] && $validatedData['max_height']) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear, $minHeightId, $maxHeightId, $maritalStatusId,$childrenId, $motherTongueId, $religionsId, $castesId, $validatedData) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->whereBetween('height', [$minHeightId, $maxHeightId])
                    ->when(isset($validatedData['marital_status']), function ($q) use ($maritalStatusId,$childrenId) {
                        $q->whereIn('marital_status', $maritalStatusId);
                    })
                    ->when(isset($validatedData['children']), function ($q) use ($childrenId) {
                        $q->whereIn('children', $childrenId);
                    })
                    ->when(isset($validatedData['mother_tongue']), function ($q) use ($motherTongueId) {
                        $q->whereIn('mother_tongue', $motherTongueId);
                    })

                    ->when(isset($validatedData['religion']), function ($q) use ($religionsId) {
                        $q->whereIn('religion', $religionsId);
                    })
                    ->when(isset($validatedData['caste']), function ($q) use ($castesId) {
                        $q->whereIn('caste', $castesId);
                    });
            });
            $query->whereHas('carrierDetails', function ($query) use ($validatedData, $countriesId, $statesId, $citiesId, $incomeId) {
                $query
                    ->when(isset($validatedData['country']), function ($q) use ($countriesId) {
                        $q->whereIn('country', $countriesId);
                    })
                    ->when(isset($validatedData['state']), function ($q) use ($statesId) {
                        $q->whereIn('state', $statesId);
                    })
                    ->when(isset($validatedData['city']), function ($q) use ($citiesId) {
                        $q->whereIn('city', $citiesId);
                    })
                    ->when(isset($validatedData['income']), function ($q) use ($incomeId) {
                        $q->whereIn('income', $incomeId);
                    });
            });
            $query->whereHas('images', function ($query) use ($photosId, $validatedData) {
                $query->when(isset($validatedData['photo']), function ($q) use ($photosId) {
                    $q->whereIn('id', $photosId);
                });
            });
        }
       // dd('ok')
       
        return $query->latest()->get();
    }

    private function getMaritalStatus($maritalStatusId)
    {
        if (isset($maritalStatusId) && isset($maritalStatusId[0]) && $maritalStatusId[0] === '0') {
            return MaritalStatus::where('status', 1)->pluck('id')->toArray();
        }
        return MaritalStatus::whereIn('id', $maritalStatusId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getChildren($childrenId)
    {
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '0') {
           // return MaritalStatus::where('status', 1)->pluck('id')->toArray();
           $childrenId = ['1','2','3'];
           return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '1') {
           // return MaritalStatus::where('status', 1)->pluck('id')->toArray();
         
           return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '2') {
           // return MaritalStatus::where('status', 1)->pluck('id')->toArray();
         
           return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '3') {
           // return MaritalStatus::where('status', 1)->pluck('id')->toArray();
          dd($childrenId);
           return $childrenId;
        }
       // return MaritalStatus::whereIn('id', $maritalStatusId)->where('status', 1)->pluck('id')->toArray();
       return $childrenId;
    }

    private function getMotherTongue($motherTongueId)
    {
        if (isset($motherTongueId) && isset($motherTongueId[0]) && $motherTongueId[0] === '0') {
            return MotherTongue::where('status', 1)->pluck('id')->toArray();
        }
        return MotherTongue::whereIn('id', $motherTongueId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getIncome($incomeId)
    {
        if (isset($incomeId) && isset($incomeId[0]) && $incomeId[0] === '0') {
            return Income::where('status', 1)->pluck('id')->toArray();
        }
        return Income::whereIn('id', $incomeId)->where('status', 1)->pluck('id')->toArray();
    }

    private function getReligion($religionId)
    {
        if (!is_array($religionId) || empty($religionId)) {
            return [];
        }

        return Religion::whereIn('id', $religionId)->pluck('id')->toArray();
    }

    private function getCaste($casteId)
    {
        if (empty($casteId)) {
            return [];
        }
        return Religion::whereIn('id', $casteId)->pluck('id')->toArray();
    }
    private function getCountry($CountryId)
    {
        if (empty($CountryId)) {
            return [];
        }
        return Country::whereIn('id', $CountryId)->pluck('id')->toArray();
    }
    private function getState($stateId)
    {
        if (empty($stateId)) {
            return [];
        }
        return State::whereIn('id', $stateId)->pluck('id')->toArray();
    }
    private function getCity($casteId)
    {
        if (empty($casteId)) {
            return [];
        }
        return City::whereIn('id', $casteId)->pluck('id')->toArray();
    }

    private function getPhoto($requestPhoto)
    {
        $userId = Auth::user()->id;

        if (is_null($requestPhoto)) {
            return [];
        }

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

        if (is_null($minY) && is_null($maxY)) {
            return [];
        }
        $minY = intval($minY);
        $maxY = intval($maxY);
        $maxYear = $currentYear - $minY;
        $minYear = $currentYear - $maxY;

        return [$minYear, $maxYear];
    }
}
