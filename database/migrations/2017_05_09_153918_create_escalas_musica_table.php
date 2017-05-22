<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscalasMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalas_musica', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('token',6)->index();

            $table->dateTime('publicado_em')->nullable();

            $table->integer('lider_id')->unsigned()->index()->nullable();
            $table->foreign('lider_id')
              ->references('id')
              ->on('colaboradores_musica');

            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')
                ->references('id')
                ->on('eventos');
        });

        Schema::table('eventos', function($table) {
            $table->integer('escala_musica_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function($table) {
            $table->dropColumn('escala_musica_id');
        });
        Schema::dropIfExists('escalas_musica');
    }
}
