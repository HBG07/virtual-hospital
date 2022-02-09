<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesquisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesquisas', function (Blueprint $table) {
            $table->string('CI_pesquisado');
            $table->date('fecha');
            $table->set('tipo_pesquisador',['médico','estomatólogo','enfermera','técnico','estudiante','lider de la comunidad']);
            $table->boolean('anciano_solo');
            $table->boolean('app');
            $table->boolean('encamado');
            $table->boolean('VIH');
            $table->boolean('diambulante');
            $table->boolean('familia_riesgo');
            $table->boolean('embarazada');
            $table->boolean('puerpera');
            $table->boolean('contacto');
            $table->boolean('inmunodeprimido');
            $table->boolean('t_salud');
            $table->boolean('t_turismo');

            $table->foreign('CI_pesquisado')->references('CI')->on('pesquisados')->onDelete('cascade');
            $table->primary(['CI_pesquisado','fecha']);
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
        Schema::dropIfExists('pesquisa');
    }
}
