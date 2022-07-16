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
            $table->string('date_commande')->nullable();
            $table->string('date_livraison')->nullable();
            $table->string('status');
            $table->string('reglement')->nullable();
             $table->string('pourcentage');
            $table->string('unite');
            $table->integer('tva');

            $table->integer('remise')->nullable();
            $table->foreignId('produit_id')->constrained('produits')->ondelete('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
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
            $table->dropForeign('produit_id');
            $table->dropforeign('commande_id');

        });
        Schema::dropIfExists('produit_commande');
    }
}
