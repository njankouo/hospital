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
            $table->string('name');
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
           // $table->rememberToken();
           $table->integer('telephone')->nullable();
           $table->string('specialite')->nullable();
           $table->integer('sexe')->nullable();
           $table->integer('role_id')->nullable();
           $table->string('lieu')->nullable();
           $table->string('date')->nullable();
           $table->date('deleted_at')->nullable();
           $table->string('prenom')->nullable();

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
        Schema::dropIfExists('users');
    }
}
