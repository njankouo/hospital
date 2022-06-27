<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class commandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_commande'=>$this->faker->date,
            'date_livraison'=>$this->faker->date,
            'status'=>$this->faker->phoneNumber,
            'fournisseur_id'=>$this->faker->lastName
        ];
    }
}
