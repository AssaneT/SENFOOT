<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stat_id')->references('id')->on('statistiques')->onDelete('cascade');
            $table->foreignId('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->text('nomequipe');
            $table->integer('numerobuteur');
            $table->text('nombuteur');
            $table->text('passeurdec');
            $table->text('buteurcsc');
            $table->tinyInteger('minute');
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
        Schema::dropIfExists('buts');
    }
}
