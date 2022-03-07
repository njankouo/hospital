<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('code_commande');
            $table->date('date_commande');
            $table->integer('pu');
            $table->integer('qte');
            $table->integer('prix_total')->nullable();
            $table->foreignId('fournisseur_id')->constrained('fournisseurs');
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
        Schema::table('commandes',function(Blueprint $table){
            $table->dropForeign('fournisseur_id');
            $table->dropForeign('pharmacie_id');
        });
        Schema::dropIfExists('commandes');
    }
}
