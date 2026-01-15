<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\ProfileFor;
use App\Models\Height;
use App\Models\MotherTongue;
use App\Models\Religion;
use App\Models\MaritalStatus;
use App\Models\Rashi;
use App\Models\Country;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\Income;
use App\Models\FatherOccupation;
use App\Models\MotherOccupation;
use App\Models\BodyType;
use App\Models\Complextion;
use App\Models\BloodGroup;
use App\Models\Habit;
use App\Models\Challenge;
use App\Models\Hobby;
use App\Models\Interest;
use App\Models\Music;
use App\Models\Dress;
use App\Models\Movie;
use App\Models\Sport;

class OptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->cacheOptions();
    }

    private function cacheOptions()
    {
        $options = [
            'profileFors' => ProfileFor::class,
            'heights' => Height::class,
            'motherTongues' => MotherTongue::class,
            'religions' => fn() => Religion::with('castes')->where('status', 1)->get(),
            'maritalStatuses' => MaritalStatus::class,
            'rashies' => Rashi::class,
            'countries' => Country::class,
            'educations' => Education::class,
            'employees' => Employee::class,
            'occupations' => Occupation::class,
            'incomes' => Income::class,
            'fatherOccupations' => FatherOccupation::class,
            'motherOccupations' => MotherOccupation::class,
            'bodyTypes' => BodyType::class,
            'complexions' => Complextion::class,
            'bloodGroups' => BloodGroup::class,
            'habits' => Habit::class,
            'physicalStatuses' => Challenge::class,
            'hobbies' => Hobby::class,
            'interests' => Interest::class,
            'musics' => Music::class,
            'dresses' => Dress::class,
            'movies' => Movie::class,
            'sports' => Sport::class,
        ];

        foreach ($options as $key => $model) {
            Cache::remember($key, 60, function () use ($model) {
                if (is_callable($model)) {
                    return $model();
                } else {
                    return $model::where('status', 1)->get();
                }
            });
        }
    }
    public function register()
    {
        //
    }
}
