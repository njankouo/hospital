<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'nom'=>$this->faker->firstName,
            'prenom'=>$this->faker->lastName,
            'sexe'=>array_rand(['M','F'],1),
            'telephone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'numeroCNI'=>$this->faker->numberBetween,
            'adresse'=>$this->faker->address,
            'status'=>array_rand(['actif','inactif'],1),


        ];
    }
}
