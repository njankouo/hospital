<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unite extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_articles')->insert([
            ['nom'=>'carton'],
            ['nom'=>'boite'],
           // ['nom'=>'ampoule'],
           // ['nom'=>'bonbone'],

        ]);
    }
}
