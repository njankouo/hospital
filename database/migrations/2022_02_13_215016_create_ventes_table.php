<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('pu');
            $table->integer('qte');
            $table->integer('prix_total');
            $table->foreignId('produit_id')->constrained('produits');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('pharmacie_id')->constrained('pharmacies');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('paiement_id')->constrained('paiements');
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
      schema::table('ventes',function(Blueprint $table){
        $table->dropForeign('produit_id');
        $table->dropForeign('user_id');
        $table->dropForeign('pharmacie_id');
        $table->dropForeign('client_id');
        $table->dropForeign('paiement_id');
      });
        Schema::dropIfExists('ventes');
    }
}
