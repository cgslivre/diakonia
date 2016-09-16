<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaColunasConfirmacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('musica_escala_servico', function (Blueprint $table) {
            $table->dateTime('impedimento_data')->nullable();
            $table->dateTime('impedimento_justificativa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('musica_escala_servico', function (Blueprint $table) {
            $table->dropColumn(['impedimento_data', 'impedimento_justificativa']);
        });
    }
}
