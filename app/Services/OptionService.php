<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class OptionService
{
    public function getOption()
    {
        $options = [
            'profileFors' => \App\Models\ProfileFor::class,
            'heights' => \App\Models\Height::class,
            'motherTongues' => \App\Models\MotherTongue::class,
            'religions' => fn() => \App\Models\Religion::with('castes')->where('status', 1)->get(),
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
            'complexions' => \App\Models\Complextion::class,
            'bloodGroups' => \App\Models\BloodGroup::class,
            'habits' => \App\Models\Habit::class,
            'physicalStatuses' => \App\Models\Challenge::class,
            'hobbies' => \App\Models\Hobby::class,
            'interests' => \App\Models\Interest::class,
            'musics' => \App\Models\Music::class,
            'dresses' => \App\Models\Dress::class,
            'movies' => \App\Models\Movie::class,
            'sports' => \App\Models\Sport::class,

        ];

        $results = [];

        foreach ($options as $key => $model) {
            $results[$key] = Cache::remember($key, 60, function () use ($model) {
                return is_callable($model)
                    ? $model()
                    : $model::where('status', 1)->get();
            });
        }

        return $results;
    }
}
