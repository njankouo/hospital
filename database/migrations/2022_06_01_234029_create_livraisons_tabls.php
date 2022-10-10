<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTabls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons_tabls', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->integer('pu');
            $table->foreignId('produit_id')->constrained('produits');
            $table->string('unite');
            $table->string ('fournisseur');
            $table->string('date_commande');
            $table->string('date_livraison')->nullable();
            $table->integer('status_paiement')->nullable();
            $table->string('status');
             // $table->string('status_paiement');
            $table->foreignId('commande_id')->constrained('commandes');


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
        schema::table('livraisons',function(Blueprint $table){
            $table->dropForeign('commande_id');
              $table->dropForeign('produit_id');
        });
        Schema::dropIfExists('livraisons_tabls');
    }
}
