<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicaEscala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musica_escala', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('confirmacao_lider')->nullable();

            $table->integer('lider_id')->unsigned()->index()->nullable();
            $table->foreign('lider_id')
              ->references('id')
              ->on('musica_staff');

            $table->integer('evento_id')->unsigned()->index();
            $table->foreign('evento_id')
              ->references('id')
              ->on('musica_evento');

            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('modified_by')
                ->references('id')
                ->on('users');
        });

        Schema::create('musica_escala_servico', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('escala_id')->unsigned()->index();
            $table->foreign('escala_id')
                ->references('id')
                ->on('musica_escala');

            $table->integer('musica_staff_id')->unsigned()->index();
            $table->integer('musica_servico_id')->unsigned()->index();

            $table->foreign('musica_staff_id')->references('id')->on('musica_staff');
            $table->foreign('musica_servico_id')->references('id')->on('musica_servicos');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('musica_escala_servico');
        Schema::drop('musica_escala');
    }
}
