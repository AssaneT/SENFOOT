<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matche_id')->constrained()->onDelete('cascade');
            $table->integer('but_equipe_dom')->default(0);
            $table->integer('but_equipe_adv')->default(0);
            $table->integer('tir_equipe_dom')->default(0);
            $table->integer('tir_equipe_adv')->default(0);
            $table->integer('tircadre_equipe_dom')->default(0);
            $table->integer('tircadre_equipe_adv')->default(0);
            $table->integer('possession_equipe_dom')->default(0);
            $table->integer('possession_equipe_adv')->default(0);
            $table->integer('passe_equipe_dom')->default(0);
            $table->integer('passe_equipe_adv')->default(0);
            $table->integer('faute_equipe_dom')->default(0);
            $table->integer('faute_equipe_adv')->default(0);
            $table->integer('cartonjaune_equipe_dom')->default(0);
            $table->integer('cartonjaune_equipe_adv')->default(0);
            $table->integer('cartonrouge_equipe_dom')->default(0);
            $table->integer('cartonrouge_equipe_adv')->default(0);
            $table->integer('horsjeu_equipe_dom')->default(0);
            $table->integer('horsjeu_equipe_adv')->default(0);
            $table->integer('corners_equipe_dom')->default(0);
            $table->integer('corners_equipe_adv')->default(0);
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
        Schema::dropIfExists('statistiques');
    }
}
