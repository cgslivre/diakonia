<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('grupo_inscricao', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('nome')->unique();

          $table->boolean('ativo')->default(true);

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupo_inscricao');
    }
}
