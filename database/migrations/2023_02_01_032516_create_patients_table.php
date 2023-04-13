<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('lieu');
            $table->integer('telephone');
            $table->integer('tel');
           $table->date('date');
           $table->string('age');
           $table->string('groupe');
           $table->string('etat');
            $table->string('email');
            $table->integer('sexe');
            $table->string('adresse');
            $table->string('profession');
            $table->string('assurance');
            $table->string('numAssurance');
            $table->string('prevenir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
