<?php

namespace Database\Seeders;

use App\Models\client;
use App\Models\commande;
use App\Models\fournisseur;
use App\Models\type_produit;
use Database\Seeders\categorie;
use Illuminate\Database\Seeder;
use Database\Factories\commandeFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
           $this->call(role::class);
        fournisseur::factory(15)->create();
        $this->call(user::class);
        $this->call(Rayon::class);
     // commande::factory(25)->create();
     client::factory(125)->create();
     $this->call(unite::class);
     $this->call(categorie::class);
  
    }
}
