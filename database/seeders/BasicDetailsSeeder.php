<?php

namespace Database\Seeders;

use App\Models\BasicDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        BasicDetail::factory(10)->create();
    }
}
