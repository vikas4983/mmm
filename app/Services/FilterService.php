<?php

namespace App\Services;

use App\Models\BasicDetail;
use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use App\Models\MotherTongue;
use App\Models\Income;
use App\Models\HoroscopeDetail;
use App\Models\FamilyStatus;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\Challenge;
use App\Models\DietaryHabit;
use App\Models\DrinkHabit;
use App\Models\FamilyDetail;
use App\Models\SmokeHabit;
use Illuminate\Support\Facades\Auth;
use App\Traits\SearchGender;
use App\Traits\UserBlockTrait;
use App\Traits\UserStatusTrait;

class FilterService
{
    use SearchGender;
    use UserBlockTrait;
    use UserStatusTrait;

    public function filter($validatedData, $user)
    {
        $gender = $this->getGender($user);
        $minHeightId = (int) $validatedData['min_height'];
        $maxHeightId = (int) $validatedData['max_height'];
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);
        $religionsId = $this->getReligion($validatedData['religion'] ?? []);
        $castesId = $this->getCaste($validatedData['caste'] ?? []);
        $maritalStatusId = $this->getMaritalStatus($validatedData['marital_status'] ?? []);
        $childrenId = $this->getChildren($validatedData['children'] ?? []);
        $motherTongueId = $this->getMotherTongue($validatedData['mother_tongue'] ?? []);
        $incomeId = $this->getIncome($validatedData['income'] ?? []);
        $countriesId = $this->getCountry($validatedData['country'] ?? []);
        $statesId = $this->getState($validatedData['state'] ?? []);
        $citiesId = $this->getCity($validatedData['city'] ?? []);
        $educationId = $this->getEducation($validatedData['education'] ?? []);
        $occupationId = $this->getOccupation($validatedData['occupation'] ?? []);
        $manglikId = $this->getManglik($validatedData['manglik'] ?? []);
        $horoscopeId = $this->getHoroscope($validatedData['horoscope'] ?? []);
        $familyStatusId = $this->getFamilyStatus($validatedData['family_status'] ?? []);
        $physicalStatusId = $this->getPhysicalStatus($validatedData['physical_status'] ?? []);
        $dietId = $this->getDiet($validatedData['diet'] ?? []);
        $drinkId = $this->getDrink($validatedData['drink'] ?? []);
        $smokeId = $this->getSmoke($validatedData['smoke'] ?? []);
        $hivId = $this->getHiv($validatedData['hiv'] ?? []);
        $query = User::query()->where('gender', $gender);
        $blockedIds =  $this->userBlock($user);
        $userStatusIds = $this->userStatus();
        if (!empty($blockedIds)) {
            $query->whereNotIn('id', $blockedIds);
        }
        if (!empty($userStatusIds)) {
            $query->whereNotIn('id', $userStatusIds);
        }
        if ($validatedData['min_age'] && $validatedData['max_age'] && $validatedData['min_height'] && $validatedData['max_height']) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear, $minHeightId, $maxHeightId, $maritalStatusId, $childrenId, $motherTongueId, $religionsId, $castesId) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->whereBetween('height', [$minHeightId, $maxHeightId])
                    ->when(isset($maritalStatusId), function ($q) use ($maritalStatusId) {
                        $q->whereIn('marital_status', $maritalStatusId);
                    })
                    ->when(isset($childrenId), function ($q) use ($childrenId) {
                        $q->whereIn('children', $childrenId);
                    })
                    ->when(isset($motherTongueId), function ($q) use ($motherTongueId) {
                        $q->whereIn('mother_tongue', $motherTongueId);
                    })
                    ->when(isset($religionsId), function ($q) use ($religionsId) {
                        $q->whereIn('religion', $religionsId);
                    })
                    ->when(isset($castesId), function ($q) use ($castesId) {
                        $q->whereIn('caste', $castesId);
                    });
            });
            $query->whereHas('carrierDetails', function ($query) use ($validatedData, $countriesId, $statesId, $citiesId, $incomeId, $educationId, $occupationId) {
                $query
                    ->when(isset($countriesId), function ($q) use ($countriesId) {
                        $q->whereIn('country', $countriesId);
                    })
                    ->when(isset($statesId), function ($q) use ($statesId) {
                        $q->whereIn('state', $statesId);
                    })
                    ->when(isset($citiesId), function ($q) use ($citiesId) {
                        $q->whereIn('city', $citiesId);
                    })
                    ->when(isset($incomeId), function ($q) use ($incomeId) {
                        $q->whereIn('income', $incomeId);
                    })
                    ->when(isset($educationId), function ($q) use ($educationId) {
                        $q->whereIn('education', $educationId);
                    })
                    ->when(isset($occupationId), function ($q) use ($occupationId) {
                        $q->whereIn('occupation', $occupationId);
                    });
            });
            $query->whereHas('horoscopeDetails', function ($query) use ($manglikId, $horoscopeId) {
                $query
                    ->when(isset($manglikId), function ($q) use ($manglikId) {
                        $q->whereIn('manglik', $manglikId);
                    })
                    ->when(isset($horoscopeId), function ($q) use ($horoscopeId) {
                        $q->whereIn('id', $horoscopeId);
                    });
            });
            $query->whereHas('familyDetails', function ($query) use ($familyStatusId) {
                $query->when(isset($familyStatusId), function ($q) use ($familyStatusId) {
                    $q->whereIn('id', $familyStatusId);
                });
            });
            $query->whereHas('lifestyleDetails', function ($query) use ($physicalStatusId, $dietId, $drinkId, $smokeId, $hivId) {
                $query
                    ->when(isset($physicalStatusId), function ($q) use ($physicalStatusId) {
                        $q->whereIn('physical_status', $physicalStatusId);
                    })
                    ->when(isset($dietId), function ($q) use ($dietId) {
                        $q->whereIn('dietary_habit', $dietId);
                    })
                    ->when(isset($drinkId), function ($q) use ($drinkId) {
                        $q->whereIn('drinking_habit', $drinkId);
                    })
                    ->when(isset($smokeId), function ($q) use ($smokeId) {
                        $q->whereIn('smoking_habit', $smokeId);
                    })
                    ->when(isset($hivId), function ($q) use ($hivId) {
                        $q->whereIn('hiv', $hivId);
                    });
            });
            $photosId = $this->getPhoto($validatedData['profile_show'] ?? '', $query);
            $query = User::query()->whereIn('id', $photosId);
        }

        return $query;
    }

    private function getMaritalStatus($maritalStatusId)
    {
        if (empty($maritalStatusId)) {
            return MaritalStatus::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($maritalStatusId) && $maritalStatusId[0] === '0') {
            return MaritalStatus::where('status', 1)->pluck('id')->toArray();
        }
        return MaritalStatus::whereIn('id', $maritalStatusId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getChildren($childrenId)
    {
        if (!empty($childrenId) && isset($childrenId[0]) && $childrenId[0] === '0') {
            return [00, 1, 2,];
        }
        return array_map('intval', $childrenId);
    }

    private function getMotherTongue($motherTongueId)
    {
        if (empty($motherTongueId)) {
            return MotherTongue::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($motherTongueId)  && $motherTongueId[0] === '0') {
            return MotherTongue::where('status', 1)->pluck('id')->toArray();
        }
        return MotherTongue::whereIn('id', $motherTongueId)->where('status', 1)->pluck('id')->toArray();
    }

    private function getReligion($religionId)
    {
        if (empty($religionId)) {
            return Religion::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($religionId)  && $religionId[0] === '0') {
            return Religion::where('status', 1)->pluck('id')->toArray();
        }
        return Religion::whereIn('id', $religionId)->where('status', 1)->pluck('id')->toArray();
    }

    private function getCaste($casteId)
    {
        if (empty($casteId)) {
            return Caste::where('status', 1)->pluck('id')->toArray();
        }
        if ((!empty($casteId)  && $casteId[0] === '0')) {
            return Caste::where('status', 1)->pluck('id')->toArray();
        }
        return Caste::whereIn('id', $casteId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getCountry($CountryId)
    {
        if (empty($CountryId)) {
            return Country::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($CountryId)  && $CountryId[0] === '0') {
            return Country::where('status', 1)->pluck('id')->toArray();
        }
        return Country::whereIn('id', $CountryId)->pluck('id')->toArray();
    }
    private function getState($stateId)
    {
        if (empty($stateId)) {
            return State::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($stateId) && $stateId[0] === '0') {
            return State::where('status', 1)->pluck('id')->toArray();
        }
        return State::whereIn('id', $stateId)->pluck('id')->toArray();
    }

    private function getCity($casteId)
    {
        if (empty($casteId)) {
            return City::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($casteId)  && $casteId[0] === '0') {
            return City::where('status', 1)->pluck('id')->toArray();
        }
        return City::whereIn('id', $casteId)->pluck('id')->toArray();
    }
    private function getIncome($incomeId)
    {
        if (empty($incomeId)) {
            return Income::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($incomeId)  && $incomeId[0] === '0') {
            return Income::where('status', 1)->pluck('id')->toArray();
        }
        return Income::whereIn('id', $incomeId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getEducation($educationId)
    {
        if (empty($educationId)) {
            return Education::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($educationId)  && $educationId[0] === '0') {
            return Education::where('status', 1)->pluck('id')->toArray();
        }
        return Education::whereIn('id', $educationId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getOccupation($occupationId)
    {
        if (empty($occupationId)) {
            return Occupation::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($occupationId)  && $occupationId[0] === '0') {
            return Occupation::where('status', 1)->pluck('id')->toArray();
        }
        return Occupation::whereIn('id', $occupationId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getPhoto($PhotoId, $query)
    {

        $userids = $query->get()->pluck('id')->toArray();
        $userId = Auth::user()->id;
        if (!empty($PhotoId) && $PhotoId[0] === '0') {
            $withPhotoIds = Image::whereIn('user_id', $userids)->where('user_id', '!=', $userId)->where('status', 1)->pluck('user_id')->toArray();
            $filterUsers = array_merge($withPhotoIds, $userids);
            return array_unique($filterUsers);
        }
        return  Image::with('user')->whereIn('user_id', $userids)->where('user_id', '!=', $userId)->where('status', 1)->pluck('user_id')->toArray();
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
    public function getManglik($manglikId)
    {
        if (empty($manglikId)) {
            return [0, 1, 2];
        }
        if (is_array($manglikId) && isset($manglikId[0]) && $manglikId[0] === '0') {
            return [0, 1, 2];
        }

        if (is_array($manglikId) && !empty($manglikId)) {
            return $manglikId;
        }
    }
    public function getHoroscope($horoscopeId)
    {
        $loginUser = Auth::user();
        $users = User::where('status', 1)->get();
        $userHoroscopeIds = [];
        if (empty($horoscopeId)) {
            foreach ($users as $user) {
                if ($user->gender != $loginUser->gender) {
                    $userHoroscopes = HoroscopeDetail::where('user_id', $user->id)
                        ->pluck('id')
                        ->toArray();
                    $userHoroscopeIds = array_merge($userHoroscopeIds, $userHoroscopes);
                }
            }
            return $userHoroscopeIds;
        }

        if (!empty($horoscopeId) && is_array($horoscopeId) && isset($horoscopeId[0]) && $horoscopeId[0] === '0') {

            foreach ($users as $user) {
                if ($user->gender != $loginUser->gender) {
                    $userHoroscopes = HoroscopeDetail::where('user_id', $user->id)
                        ->pluck('id')
                        ->toArray();
                    $userHoroscopeIds = array_merge($userHoroscopeIds, $userHoroscopes);
                }
            }
            return $userHoroscopeIds;
        }
        if (is_array($horoscopeId) && isset($horoscopeId[0]) && $horoscopeId[0] === '1') {
            foreach ($users as $user) {
                if ($user->gender != $loginUser->gender) {
                    $userHoroscopes = HoroscopeDetail::where('user_id', $user->id)
                        ->where('place_of_birth', '!=', '')
                        ->where('time_of_birth', '!=', '')
                        ->pluck('id')
                        ->toArray();
                    $userHoroscopeIds = array_merge($userHoroscopeIds, $userHoroscopes);
                }
            }
            return $userHoroscopeIds;
        }
    }
    public function getFamilyStatus($familyStatusId)
    {
        if (empty($familyStatusId)) {
            return FamilyDetail::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($familyStatusId)  && $familyStatusId[0] === '0') {
            return FamilyDetail::where('status', 1)->pluck('id')->toArray();
        }
        return FamilyDetail::whereIn('id', $familyStatusId)->pluck('id')->toArray();
    }

    private function getPhysicalStatus($physicalStatusId)
    {
        if (empty($physicalStatusId)) {
            return Challenge::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($physicalStatusId) && $physicalStatusId[0] === '0') {
            return Challenge::where('status', 1)->pluck('id')->toArray();
        }
        return Challenge::whereIn('id', $physicalStatusId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getDiet($dietId)
    {
        if (empty($dietId)) {
            return DietaryHabit::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($dietId) && $dietId[0] === '0') {
            return DietaryHabit::where('status', 1)->pluck('id')->toArray();
        }
        return DietaryHabit::whereIn('id', $dietId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getDrink($drinkId)
    {
        if (empty($drinkId)) {
            return DrinkHabit::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($drinkId) && $drinkId[0] === '0') {
            return DietaryHabit::where('status', 1)->pluck('id')->toArray();
        }
        return DietaryHabit::whereIn('id', $drinkId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getSmoke($smokeId)
    {
        if (empty($smokeId)) {
            return SmokeHabit::where('status', 1)->pluck('id')->toArray();
        }
        if (!empty($smokeId) && $smokeId[0] === '0') {
            return SmokeHabit::where('status', 1)->pluck('id')->toArray();
        }
        return SmokeHabit::whereIn('id', $smokeId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getHiv($hivId)
    {
        if (empty($hivId)) {
            return [0, 1, 2];
        }
        if (!empty($hivId) && in_array('0', $hivId)) {
            return [0, 1, 2];
        } elseif (!empty($hivId)) {
            $validHivId = [1, 2];
            return array_intersect($hivId, $validHivId);
        }
    }
}
