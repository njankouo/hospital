<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
             DB::table('roles')->insert(
array(
    0=>array('id'=>1,'nom'=>'admin'),
    1=>array('id'=>2,'nom'=>'superadmin'),
    2=>array('id'=>3,'libelle'=>'utilisateur'),

)

        );
    }
}
