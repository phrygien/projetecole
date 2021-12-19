<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('debut');
            $table->string('fin');
            $table->string('etat')->default(0);
            $table->unsignedBigInteger('atablissement_id');
            $table->foreign('atablissement_id')->references('id')->on('etablissements');
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
        Schema::dropIfExists('annees');
    }
}
