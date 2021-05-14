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
            $table->string('email')->nullable();
            $table->string('adresse');
            $table->string('telephone');
            $table->date('naissance')->nullable();
            $table->double('salaire')->nullable();
            $table->string('username');
            $table->string('repondant')->nullable();
            $table->string('repondantAdr')->nullable();
            $table->string('contact')->nullable();
            $table->boolean('etat');
            $table->unsignedBigInteger('profils_id');
            $table->unsignedBigInteger('postes_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
