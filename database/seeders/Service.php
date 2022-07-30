<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Service extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::insert('insert into services (id, nom) values (?, ?)', [1, 'hospit']);
    DB::insert('insert into services (id, nom) values (?, ?)', [2, 'consult']);
    DB::insert('insert into services (id, nom) values (?, ?)', [3, 'bloc1']);
    DB::insert('insert into services (id, nom) values (?, ?)', [4, 'bloc2']);
    DB::insert('insert into services (id, nom) values (?, ?)', [5, 'personnel']);
    DB::insert('insert into services (id, nom) values (?, ?)', [6, 'LEC']);
    }
}
