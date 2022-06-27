<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
             $table->id();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('sexe');
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('pieceIdentite')->nullable();
            $table->string('numeroPieceIdentite')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status');
          $table->string('photo')->nullable();
          $table->foreignId('role_id')->constrained('roles')->nullable();
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
        schema::table('users',function(Blueprint $table){
            $table->dropForeign('role_id');
        });
        Schema::dropIfExists('users');
    }
}
