<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->text('nomequipe');
            $table->foreignId('joueur_id')->references('id')->on('effectifs')->nullOnDelete();
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
        Schema::dropIfExists('titulaires');
    }
}
