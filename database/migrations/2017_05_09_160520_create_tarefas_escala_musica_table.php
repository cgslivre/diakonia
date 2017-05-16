<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasEscalaMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas_escala_musica', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();            

            $table->integer('escala_id')->unsigned()->index();
            $table->foreign('escala_id')
                ->references('id')
                ->onDelete('cascade')
                ->on('escalas_musica');

            $table->integer('colaborador_id')->unsigned()->index();
            $table->foreign('colaborador_id')
                ->references('id')
                ->on('colaboradores_musica');

            $table->integer('servico_id')->unsigned()->index();
            $table->foreign('servico_id')
                ->references('id')
                ->on('servicos_musica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas_escala_musica');
    }
}
