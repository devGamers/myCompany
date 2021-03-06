<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreeSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entree_sorties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description');
            $table->double('entree')->default(0);
            $table->double('sortie')->default(0);
            $table->unsignedBigInteger('activites_id');
            $table->unsignedBigInteger('type_depenses_id')->nullable();
            $table->unsignedBigInteger('type_entrees_id')->nullable();
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
        Schema::dropIfExists('entree_sorties');
    }
}
