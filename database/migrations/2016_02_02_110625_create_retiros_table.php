<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'retiros', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->dateTime('data_inicio')->nullable();
            $table->dateTime('data_fim')->nullable();

            $table->decimal('valor', 5, 2)->nullable();
            $table->decimal('valor_meia', 5, 2)->nullable();

            $table->integer('limite_meia')->nullable();
            $table->integer('limite_isento')->nullable();

            $table->integer('limite_inscritos')->nullable();

            $table->string('ref_banner')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('retiros');
    }
}
