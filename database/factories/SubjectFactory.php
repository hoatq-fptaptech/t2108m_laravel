<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sbid'=>"S".$this->faker->randomNumber(),
            'name'=>$this->faker->jobTitle
        ];
    }
}
