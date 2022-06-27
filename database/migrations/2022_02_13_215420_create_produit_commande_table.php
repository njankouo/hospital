<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_commande', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->integer('pu');
            $table->string('fournisseur');
            $table->string('date_commande');
            $table->string('date_livraison')->nullable();
            $table->string('status');
            $table->string('reglement');
             $table->string('pourcentage');
            $table->string('unite');
            $table->integer('tva')->nullable();

            $table->integer('remise')->nullable();
            $table->foreignId('produit_id')->constrained('produits');
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
        schema::table('produit_commande',function(Blueprint $table){
            $table->dropforeign('produit_id');
            $table->dropforeign('commande_id');

        });
        Schema::dropIfExists('produit_commande');
    }
}
