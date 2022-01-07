<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEffectifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('effectifs', function (Blueprint $table) {
            $table->id();
            $table->text('prenom');
            $table->text('nom');
            $table->date('datenaissance');
            $table->text('lieunaissance');
            $table->text('nationalite');
            $table->text('club');
            $table->text('poste');
            $table->integer('age');
            $table->integer('numero');
            $table->text('taille');
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
        Schema::dropIfExists('effectifs');
    }
}
