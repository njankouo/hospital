<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('date_debut');
             $table->string('date_fin');
              $table->foreignId('fournisseur_id')->constrained('fournisseurs');
              $table->string('image');
              $table->string('reglement');
                $table->string('status');
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
        schema::table('contrats',function(Blueprint $table){
            $table->dropForeign('fournisseur_id');
        });
        Schema::dropIfExists('contrats');
    }
}
