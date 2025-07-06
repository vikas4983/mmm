<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;


class OptionService
{

    public function boot()
    {
        if (App::runningInConsole() && !App::runningUnitTests()) {
            return;
        }

        if (!Schema::hasTable('cache')) {
            return;
        }

        $this->getOptions();
    }


    public function getOptions()
    {
        $options = [
            'profileFors' => \App\Models\ProfileFor::class,
            'heights' => \App\Models\Height::class,
            'motherTongues' => \App\Models\MotherTongue::class,
            'religions' => fn() => \App\Models\Religion::with('castes')->where('status', 1)->get(),
            'castes' => \App\Models\Caste::class,
            'maritalStatuses' => \App\Models\MaritalStatus::class,
            'rashies' => \App\Models\Rashi::class,
            'countries' => fn() => \App\Models\Country::with('states')->where('status', 1)->get(),
            'states' => \App\Models\State::class,
            'cities' => \App\Models\City::class,
            'educations' => \App\Models\Education::class,
            'employees' => \App\Models\Employee::class,
            'occupations' => \App\Models\Occupation::class,
            'incomes' => \App\Models\Income::class,
            'fatherOccupations' => \App\Models\FatherOccupation::class,
            'motherOccupations' => \App\Models\MotherOccupation::class,
            'bodyTypes' => \App\Models\BodyType::class,
            'complextions' => \App\Models\Complextion::class,
            'bloodGroups' => \App\Models\BloodGroup::class,
            'habits' => \App\Models\Habit::class,
            'physicalStatuses' => \App\Models\Challenge::class,
            'hobbies' => \App\Models\Hobby::class,
            'interests' => \App\Models\Interest::class,
            'musics' => \App\Models\Music::class,
            'dresses' => \App\Models\Dress::class,
            'movies' => \App\Models\Movie::class,
            'sports' => \App\Models\Sport::class,
            'familyTypes' => \App\Models\FamilyType::class,
            'familyValues' => \App\Models\FamilyValue::class,
            'familyStatus' => \App\Models\FamilyStatus::class,
            'relationships' => \App\Models\Relationship::class,
            'dietaryHabits' => \App\Models\DietaryHabit::class,
            'languageSpeaks' => \App\Models\LanguageSpeak::class,
        ];

        $results = [];

        foreach ($options as $key => $model) {
            try {
                $results[$key] = Cache::rememberForever($key, function () use ($model) {
                    if (is_callable($model)) {
                        $data = $model();
                    } else {
                        $data = $model::where('status', 1)->get() ?? collect();
                    }
                    return $data;
                });
            } catch (\Exception $e) {
                Log::error("Failed to fetch options for key: $key", ['error' => $e->getMessage()]);
                $results[$key] = collect();
            }
        }

        return $results;
    }
}
