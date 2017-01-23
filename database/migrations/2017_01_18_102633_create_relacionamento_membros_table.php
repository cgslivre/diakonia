<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionamentoMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacionamento_membros', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('membro_de_id')->unsigned()->index();
            $table->foreign('membro_de_id')
                ->references('id')
                ->on('membros');
            $table->integer('membro_para_id')->unsigned()->index();
            $table->foreign('membro_para_id')
                ->references('id')
                ->on('membros');

            $table->integer('relacionamento_id')->unsigned()->index();
            $table->foreign('relacionamento_id')
                ->references('id')
                ->on('relacionamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relacionamento_membros');
    }
}
