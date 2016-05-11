<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicaServico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musica_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('lideranca');

            $table->foreign('user_id')
              ->references('id')
              ->on('users');
        });

        Schema::create('musica_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->string('img')->nullable();

            $table->unique(['descricao']);
        });

        Schema::create('musica_staff_servico', function (Blueprint $table) {
            $table->integer('musica_staff_id')->unsigned()->index();
            $table->integer('musica_servico_id')->unsigned()->index();

            $table->primary(['musica_staff_id', 'musica_servico_id']);

            $table->foreign('musica_staff_id')->references('id')->on('musica_staff')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('musica_servico_id')->references('id')->on('musica_servicos')
                  ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('musica_staff_servico');
        Schema::drop('musica_servicos');
        Schema::drop('musica_staff');
    }
}
