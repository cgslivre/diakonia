<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ensino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensinos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->unique();
            $table->string('slug')->unique();

            $table->integer('categoria_ensino_id')->unsigned();
            $table->foreign('categoria_ensino_id')
                ->references('id')
                ->on('categoria_ensino');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ensinos');
    }
}
