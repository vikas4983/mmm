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
            'countries' => \App\Models\Country::class,
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

        foreach ($options as $key => $model) {
            cache::remember($key, 60, $model);
            return $model::where('status', 1)->get();
            // foreach ($this->options as $key => $model) {
            //     Cache::remember($key, 60, is_callable($model) ? $model : fn() => $model::where('status', 1)->get());
            // }
        }
    }
}
