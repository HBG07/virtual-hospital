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
            $table->boolean('anciano_solo')->default(0);
            $table->boolean('app')->default(0);
            $table->boolean('encamado')->default(0);
            $table->boolean('VIH')->default(0);
            $table->boolean('diambulante')->default(0);
            $table->boolean('familia_riesgo')->default(0);
            $table->boolean('embarazada')->default(0);
            $table->boolean('puerpera')->default(0);
            $table->boolean('contacto')->default(0);
            $table->boolean('inmunodeprimido')->default(0);
            $table->boolean('t_salud')->default(0);
            $table->boolean('t_turismo')->default(0);

            $table->foreign('CI_pesquisado')->references('CI')->on('pesquisados')->onDelete('cascade')->onUpdate('cascade');
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
