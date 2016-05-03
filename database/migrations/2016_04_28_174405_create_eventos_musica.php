<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosMusica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musica_evento', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titulo');
            $table->dateTime('hora');
            $table->timestamps();

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();

            $table->foreign('created_by')
              ->references('id')
              ->on('users');

            $table->foreign('modified_by')
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
          Schema::drop('musica_evento');
      }
}
