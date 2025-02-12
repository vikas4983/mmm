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
use App\Models\HoroscopeDetail;
use App\Models\FamilyStatus;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\Challenge;
use App\Models\DietaryHabit;
use App\Models\DrinkHabit;
use App\Models\SmokeHabit;
use Illuminate\Support\Facades\Auth;
use App\Traits\SearchGender;

class FilterService
{
    use SearchGender;

    public function filter($validatedData, $user)
    {
        $gender = $this->getGender($user);
        $minHeightId = (int) $validatedData['min_height'];
        $maxHeightId = (int) $validatedData['max_height'];
        [$minYear, $maxYear] = $this->getMinMaxYear($validatedData['min_age'], $validatedData['max_age']);
        $maritalStatusId = $this->getMaritalStatus($validatedData['marital_status'] ?? []);
        $childrenId = $this->getMaritalStatus($validatedData['children'] ?? []);
        $motherTongueId = $this->getMotherTongue($validatedData['mother_tongue'] ?? []);
        $incomeId = $this->getIncome($validatedData['income'] ?? []);
        $religionsId = $this->getReligion($validatedData['religion'] ?? []);
        $castesId = $this->getCaste($validatedData['caste'] ?? []);
        $countriesId = $this->getCountry($validatedData['country'] ?? []);
        $statesId = $this->getState($validatedData['state'] ?? []);
        $citiesId = $this->getCity($validatedData['city'] ?? []);
        $photosId = $this->getPhoto($validatedData['photo'] ?? '');
        $manglikId = $this->getManglik($validatedData['manglik'] ?? '');
        $horoscopeId = $this->getHoroscope($validatedData['horoscope'] ?? '');
        $familyStatusId = $this->getFamilyStatus($validatedData['family_status'] ?? '');
        $educationId = $this->getEducation($validatedData['education'] ?? '');
        $occupationId = $this->getOccupation($validatedData['occupation'] ?? '');
        $physicalStatusId = $this->getPhysicalStatus($validatedData['physical_status'] ?? '');
        $dietId = $this->getDiet($validatedData['diet'] ?? '');
        $drinkId = $this->getDrink($validatedData['drink'] ?? '');
        $smokeId = $this->getSmoke($validatedData['smoke'] ?? '');
        $hivId = $this->getHiv($validatedData['hiv'] ?? '');
        

        $query = User::query()->where('gender', $gender);
        if ($validatedData['min_age'] && $validatedData['max_age'] && $validatedData['min_height'] && $validatedData['max_height']) {
            $query->whereHas('basicDetails', function ($query) use ($minYear, $maxYear, $minHeightId, $maxHeightId, $maritalStatusId, $childrenId, $motherTongueId, $religionsId, $castesId, $validatedData) {
                $query
                    ->whereBetween('dob', ["$minYear-01-01", "$maxYear-12-31"])
                    ->whereBetween('height', [$minHeightId, $maxHeightId])
                    ->when(isset($validatedData['marital_status']), function ($q) use ($maritalStatusId, $childrenId) {
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
            $query->whereHas('carrierDetails', function ($query) use ($validatedData, $countriesId, $statesId, $citiesId, $incomeId, $educationId, $occupationId) {
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
                    })
                    ->when(isset($validatedData['education']), function ($q) use ($educationId) {
                        $q->whereIn('education', $educationId);
                    })
                    ->when(isset($validatedData['occupation']), function ($q) use ($occupationId) {
                        $q->whereIn('occupation', $occupationId);
                    });
            });
            $query->whereHas('images', function ($query) use ($photosId, $validatedData) {
                $query->when(isset($validatedData['photo']), function ($q) use ($photosId) {
                    $q->whereIn('id', $photosId);
                });
            });
            $query->whereHas('horoscopeDetails', function ($query) use ($manglikId, $validatedData, $horoscopeId) {
                $query->when(isset($validatedData['manglik']), function ($q) use ($manglikId) {
                    $q->whereIn('manglik', $manglikId);
                });

                $query->when(isset($validatedData['horoscope']), function ($q) use ($horoscopeId) {
                    $q->whereIn('id', $horoscopeId);
                });
            });

            $query->whereHas('familyDetails', function ($query) use ($familyStatusId) {
                $query->whereIn('family_status', $familyStatusId);
            });
            $query->whereHas('lifestyleDetails', function ($query) use ($validatedData, $hivId, $physicalStatusId, $dietId, $drinkId, $smokeId) {
                $query
                    ->when(isset($validatedData['physical_status']), function ($q) use ($physicalStatusId) {
                        $q->whereIn('physical_status', $physicalStatusId);
                    })
                    ->when(isset($validatedData['diet']), function ($q) use ($dietId) {
                        $q->whereIn('dietary_habit', $dietId);
                    })
                    ->when(isset($validatedData['drink']), function ($q) use ($drinkId) {
                        $q->whereIn('drinking_habit', $drinkId);
                    })
                    ->when(isset($validatedData['smoke']), function ($q) use ($smokeId) {
                        $q->whereIn('smoking_habit', $smokeId);
                    })
                    ->when(isset($validatedData['hiv']), function ($q) use ($hivId) {
                        $q->whereIn('hiv', $hivId);
                    });
            });
        }

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
            $childrenId = ['1', '2', '3'];
            return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '1') {
            return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '2') {
            return $childrenId;
        }
        if (isset($childrenId) && isset($childrenId[0]) && $childrenId[0] === '3') {
            return $childrenId;
        }
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

    public function getManglik($manglikId)
    {
        if (is_null($manglikId)) {
            return [];
        }
        if ($manglikId === '0') {
            $manglikId = ['0', '1', '2'];
            return $manglikId;
        }
        if ($manglikId === '1') {
            return [$manglikId];
        }
        if ($manglikId === '2') {
            return [$manglikId];
        }
    }
    public function getHoroscope($horoscopeId)
    {
        $loginUser = Auth::user();
        $users = User::where('status', 1)->get();
        $searchUser = [];
        $userHoroscopeIds = [];
        if (is_null($horoscopeId)) {
            return [];
        }
        if ($horoscopeId === '0') {
            foreach ($users as $user) {
                if ($user->gender != $loginUser->gender) {
                    $searchUser[] = $user;
                    $userHoroscopes = HoroscopeDetail::where('user_id', $user->id)
                        ->pluck('id')
                        ->toArray();
                    $userHoroscopeIds = array_merge($userHoroscopeIds, $userHoroscopes);
                }
            }
            return $userHoroscopeIds;
        }
        if ($horoscopeId === '1') {
            foreach ($users as $user) {
                if ($user->gender != $loginUser->gender) {
                    $searchUser[] = $user;
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
        if (isset($familyStatusId) && isset($familyStatusId[0]) && $familyStatusId[0] === '0') {
            return FamilyStatus::where('status', 1)->pluck('id')->toArray();
        }
        return FamilyStatus::whereIn('id', $familyStatusId)->where('status', 1)->pluck('id')->toArray();
        // if (is_null($familyStatusId)) {
        //     return [];
        // }
        // if (in_array('0', $familyStatusId)) {
        //     return ['0', '1', '2', '3'];
        // }
        // $validStatuses = ['1', '2', '3'];
        // //यह दो arrays के common values को return करता है।
        // return array_intersect($familyStatusId, $validStatuses);
    }

    private function getEducation($educationId)
    {
        if (isset($educationId) && isset($educationId[0]) && $educationId[0] === '0') {
            return Education::where('status', 1)->pluck('id')->toArray();
        }
        return Education::whereIn('id', $educationId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getOccupation($occupationId)
    {
        if (isset($occupationId) && isset($occupationId[0]) && $occupationId[0] === '0') {
            return Occupation::where('status', 1)->pluck('id')->toArray();
        }
        return Occupation::whereIn('id', $occupationId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getPhysicalStatus($physicalStatusId)
    {
        if (isset($physicalStatusId) && isset($physicalStatusId[0]) && $physicalStatusId[0] === '0') {
            return Challenge::where('status', 1)->pluck('id')->toArray();
        }
        return Challenge::whereIn('id', $physicalStatusId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getDiet($dietId)
    {
        if (isset($dietId) && isset($dietId[0]) && $dietId[0] === '0') {
            return DietaryHabit::where('status', 1)->pluck('id')->toArray();
        }
        return DietaryHabit::whereIn('id', $dietId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getDrink($drinkId)
    {
        if (isset($drinkId) && isset($drinkId[0]) && $drinkId[0] === '0') {
            return DrinkHabit::where('status', 1)->pluck('id')->toArray();
        }
        return DrinkHabit::whereIn('id', $drinkId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getSmoke($smokeId)
    {
        if (isset($smokeId) && isset($smokeId[0]) && $smokeId[0] === '0') {
            return SmokeHabit::where('status', 1)->pluck('id')->toArray();
        }
        return SmokeHabit::whereIn('id', $smokeId)->where('status', 1)->pluck('id')->toArray();
    }
    private function getHiv($hivId)
    {
        if (is_null($hivId)) {
            return [];
        }
        if (in_array('0', $hivId)) {
            return ['0', '1', '2'];
        }
        $validHivId = ['1', '2'];
        //It will give common Vales
        return array_intersect($hivId, $validHivId);
    }
}
