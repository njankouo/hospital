<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_articles', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->date('dateCommande');
            $table->date('dateLivraison');
            $table->integer('produit_id');
            $table->integer('pu');
            $table->integer('qte');
            $table->integer('status');
            // $table->foreign('conditionnement_id')
            //       ->references('id')->on('conditionnements')->onDelete('cascade');
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
        Schema::dropIfExists('commande_articles');
    }
}
