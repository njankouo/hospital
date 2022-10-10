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
            $table->string('photo')->nullable();
             $table->string('equivalence')->nullable();
            $table->integer('qtestock');
            $table->integer('stock_seuil')->nullable();
            $table->integer('pu');
            $table->integer('pv');
            $table->string('status')->nullable();
            $table->date('date_peremption')->nullable();
             $table->date('date_fabrication')->nullable();
            $table->string('grammage')->nullable();
            $table->foreignId('rayon_id')->nullable()->constrained('rayons');
            $table->foreignId('type_article_id')->nullable()->constrained('type_articles');
             $table->foreignId('categorie_id')->nullable()->constrained('categories');
             $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseurs');
             $table->foreignId('famille_id')->nullable()->constrained('familles');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('produits',function(Blueprint $table){
            $table->dropForeign('rayon_id');
            $table->dropforeign('type_article_id');
            $table->dropforeign('categorie_id');
            $table->dropforeign('fournisseur_id');
        });

        Schema::dropIfExists('produits');
    }
}
