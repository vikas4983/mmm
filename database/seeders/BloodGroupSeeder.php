<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BloodGroupSeeder extends Seeder
{
    public function run()
    {


        $bloodGroups = [
            ['name' => 'A+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'B+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'B-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'AB+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'AB-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'O+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'O-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A1+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A1-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A2+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A2-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A1B+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A1B-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A2B+', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A2B-', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'hh', 'status' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($bloodGroups as $bloodGroup) {
            BloodGroup::create($bloodGroup);
        }
    }
}
