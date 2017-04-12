<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('eventos', function (Blueprint $table) {
             $table->increments('id');
             $table->string('titulo');
             $table->string('descricao')->nullable();
             $table->text('programacao')->nullable();

             $table->softDeletes();
             $table->timestamps();

             $table->dateTime('data_hora_inicio');
             $table->dateTime('data_hora_fim');

             $table->integer('local_id')->unsigned();
             $table->foreign('local_id')
                 ->references('id')
                 ->on('local');

             $table->integer('publico_alvo_id')->unsigned();
             $table->foreign('publico_alvo_id')
                ->references('id')
                ->on('publico_alvo');

             $table->integer('tipo_evento_id')->unsigned();
             $table->foreign('tipo_evento_id')
                ->references('id')
                ->on('tipo_evento');

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('eventos');
     }
}
