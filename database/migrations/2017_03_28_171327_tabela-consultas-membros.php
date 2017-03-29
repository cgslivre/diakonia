<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaConsultasMembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_membros', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug')->unique();
            $table->string('titulo');
            $table->smallInteger('idade_minima')->nullable()->unsigned();
            $table->smallInteger('idade_maxima')->nullable()->unsigned();
            $table->char('tem_discipulos',1)->nullable();
            $table->char('tem_discipulador',1)->nullable();
            $table->char('sexo',1)->nullable();
            $table->string('regioes')->nullable();
            $table->string('grupos')->nullable();

            $table->boolean('consulta_publica')->default(false);


            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->integer('modified_by')->unsigned()->nullable();
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
        Schema::drop('consulta_membros');
    }
}
