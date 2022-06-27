<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ['libelle'=>'pillule'],
            ['libelle'=>'gellule'],
            ['libelle'=>'injectable'],
            ['libelle'=>'epiderme'],
        ]);
    }
}
