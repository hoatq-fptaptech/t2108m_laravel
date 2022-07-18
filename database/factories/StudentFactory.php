<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classes = Classes::all()->pluck("cid")->toArray();
        return [
            'sid'=>"SV".$this->faker->randomNumber(),
            'name'=>$this->faker->firstName,
            'birthday'=>$this->faker->date('Y-m-d','2005-01-01'),
            'cid'=>$this->faker->randomElement($classes)
        ];
    }
}
