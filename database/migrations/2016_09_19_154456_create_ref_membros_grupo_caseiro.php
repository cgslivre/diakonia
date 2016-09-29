<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefMembrosGrupoCaseiro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membros', function (Blueprint $table) {
            $table->integer('grupo_caseiro_id')->unsigned()->index();
            $table->foreign('grupo_caseiro_id')
                ->references('id')
                ->on('grupo_caseiro');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membros', function ($table) {
            $table->dropForeign('membros_grupo_caseiro_id_foreign');
            $table->dropColumn('grupo_caseiro_id');
        });
    }
}
