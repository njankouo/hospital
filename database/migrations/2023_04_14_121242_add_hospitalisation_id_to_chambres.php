<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHospitalisationIdToChambres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chambres', function (Blueprint $table) {
            //
            $table->foreignId('hospitalisation_id')->constrained('hospitalisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chambres', function (Blueprint $table) {
            //
        });
    }
}
