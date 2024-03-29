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
            $table->integer('qte_sortie');
            $table->integer('pu')->nullable();
            $table->string('date_vente');
            $table->integer('tva')->nullable();
            $table->foreignId('vente_id')->constrained('ventes')->onDelete('cascade');
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->string('client')->nullable();
            $table->string('user');
            $table->string('reglement')->nullable();
            $table->string('unite')->nullable();
            $table->integer('remise')->nullable();
            $table->string('beneficiaire')->nullable();

            $table->string('service')->nullable();

            $table->string('poste')->nullable();
            $table->string('stat');
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
        schema::table('vente_produits',function(Blueprint $table){
                $table->dropForeign('vente_id');
                $table->dropForeign('produit_id');
        });
        Schema::dropIfExists('vente_produits');
    }
}
