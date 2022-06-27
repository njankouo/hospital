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
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code_commande');
            $table->date('date_commande');
             $table->date('date_livraison');
            $table->string('status');
            $table->timestamps();
        });
        // schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('commandes',function(Blueprint $table){
        //     $table->dropForeign('fournisseur_id');

        // });
        Schema::dropIfExists('commandes');
    }
}
