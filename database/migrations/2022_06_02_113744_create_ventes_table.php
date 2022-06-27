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
            $table->foreignId('user_id')->constrained('users');
             $table->foreignId('client_id')->constrained('clients');
            $table->string('date_vente');
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

        $table->dropForeign('user_id');

        $table->dropForeign('client_id');

      });
        Schema::dropIfExists('ventes');
    }
}
