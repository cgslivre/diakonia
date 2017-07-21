<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradorServicosMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_servicos_musica', function (Blueprint $table) {
            $table->integer('colaborador_musica_id')->unsigned()->index();
            $table->integer('servico_musica_id')->unsigned()->index();

            $table->primary(['colaborador_musica_id', 'servico_musica_id'],'colaborador_servicos_musica_id');

            $table->foreign('colaborador_musica_id')->references('id')->on('colaboradores_musica')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('servico_musica_id')->references('id')->on('servicos_musica')
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
        Schema::dropIfExists('colaborador_servicos_musica');
    }
}
