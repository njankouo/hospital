<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('conditionnement');
            $table->string('date');

            $table->integer('produit_id');
            $table->integer('pu');
            $table->integer('qte');
            $table->string('responsable');
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
        Schema::dropIfExists('vente_produits');
    }
}
