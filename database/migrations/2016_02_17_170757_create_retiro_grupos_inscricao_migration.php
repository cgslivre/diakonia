<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetiroGruposInscricaoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiro_grupos_inscricao', function (Blueprint $table) {
            $table->integer('retiro_id')->unsigned()->index();
            $table->foreign('retiro_id')->references('id')->on('retiros')->onDelete('cascade');

            $table->integer('grupo_inscricao_id')->unsigned()->index();
            $table->foreign('grupo_inscricao_id')->references('id')->on('grupo_inscricao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('retiro_grupos_inscricao');
    }
}
