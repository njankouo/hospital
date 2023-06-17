<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom'=>$this->faker->name(),
            'prenom'=>$this->faker->lastName(),
            'email'=>$this->faker->email(),
            'lieu'=>$this->faker->address(),
            'telephone'=>$this->faker->phoneNumber(),
         //   'profession'=>$this->faker->e,
            'tel'=>$this->faker->phoneNumber(),
        ];
    }
}
