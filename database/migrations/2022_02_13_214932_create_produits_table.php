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
            $table->string('nom');
            $table->string('photo')->nullable();
            $table->date('date_expiration');
            $table->integer('stock_disponible');
            $table->foreignId('rayon_id')->constrained('rayons');
            $table->foreignId('type_article_id')->constrained('type_articles');
             $table->foreignId('categorie_id')->constrained('categories');
            $table->string('pu');
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
        });

        Schema::dropIfExists('produits');
    }
}
