<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('equivalence')->nullable();
            $table->integer('qteSeuil');
            $table->integer('qteStock');
            $table->integer('pu');
            $table->string('file')->nullable();
            $table->foreignId('famille_id')->constrained('familles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('conditionnement_id')->constrained('conditionnements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('forme_id')->constrained('forme_galleliques')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('produits');
    }
}
