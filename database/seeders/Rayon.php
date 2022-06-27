<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Rayon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rayons')->insert(
array(
    0=>array('id'=>1,'libelle'=>'section1'),
    1=>array('id'=>2,'libelle'=>'section2'),
    2=>array('id'=>3,'libelle'=>'section3'),
    3=>array('id'=>4,'libelle'=>'section4'),
    4=>array('id'=>5,'libelle'=>'section5'),
    5=>array('id'=>6,'libelle'=>'section6'),
)

        );
    }
}
