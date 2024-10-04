<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasicDetails>
 */
class BasicDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $feet = rand(4,7);
        $inches = rand(0,11);
        $height = "{$feet}'{$inches}\"";
        return [
            'user_id'=>$this->faker->randomElement(['12', '18','19']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'dob' => $this->faker->date('Y-m-d', '-18 years'),
            'height' =>  $height,
            'mother_tongue' => $this->faker->randomElement(['Hindi', 'English']),
            'religion' => $this->faker->randomElement(['Hindu', 'Muslim']),
            'caste' => $this->faker->randomElement(['Brahmin', 'Rajput','Agarwal']),
            'marital_status' => $this->faker->randomElement(['Never Married', 'Divorcee','Widow']),
            'status' => $this->faker->randomElement(['1']),
           
        ];
    }
}
