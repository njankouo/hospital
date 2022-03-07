<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class fournisseurFactory extends Factory
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
            'nom'=>$this->faker->name,
            'prenom'=>$this->faker->lastname,
            'sexe'=>array_rand(['M','F']),
            'telephone1'=>$this->faker->phoneNumber,
            'photo'=>$this->faker->imageUrl,
            'email'=>$this->faker->email

        ];
    }
}
