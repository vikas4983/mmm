<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SportSeeder extends Seeder
{
    public function run()
    {


        $sports = [
            ['name' => 'Cricket', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jogging', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cycling', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Swimming', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Martial Arts', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Yoga/Meditation', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hockey', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Football', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Volleyball', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Carrom Billiards', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Snooker', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pool', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Golf', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Weight training', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Chess', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Card', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bowling', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Scrabble', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Aerobics', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Basketball', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rugby', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Adventure sports', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Badminton', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tennis', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Squash', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Baseball', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($sports as $sport) {
            Sport::create($sport);
        }
    }
}
