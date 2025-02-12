<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UpdateUserUuidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::whereNotNull('uuid')->chunk(100, function ($users){
           foreach($users as $user){
            $user->uuid = (string) Str::uuid();
            $user->save();
           }
        });
    }
}
