<?php

namespace Database\Seeders;

use App\Models\fournisseur;
use Illuminate\Database\Seeder;

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
        fournisseur::factory(15)->create();
        $this->call(user::class);
    }
}
