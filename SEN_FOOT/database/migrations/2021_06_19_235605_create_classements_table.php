<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_championnat')->references('id')->on('championnats')->onDelete('cascade');
            $table->integer('position');
            $table->text('equipe');
            $table->integer('points');
            $table->integer('jouer');
            $table->integer('gagner');
            $table->integer('nuls');
            $table->integer('perdus');
            $table->integer('butpour');
            $table->integer('butcontre');
            $table->integer('diff');
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
        Schema::dropIfExists('classements');
    }
}
