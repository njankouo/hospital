<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitPharmacieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_pharmacie', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->integer('pu');
            $table->foreignId('produit_id')->constrained('produits');
            $table->foreignId('pharmacie_id')->constrained('pharmacies');
            $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('produit_pharmacie',function(Blueprint $table){
            $table->dropforeign('produit_id');
            $table->dropforeign('pharmacie_id');

        });
        Schema::dropIfExists('produit_pharmacie');
    }
}
