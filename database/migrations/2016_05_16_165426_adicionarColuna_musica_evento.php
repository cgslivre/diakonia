<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarColunaMusicaEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('musica_evento', function ($table) {
            $table->integer('musica_escala_id')->unsigned()->index()->nullable();
            $table->foreign('musica_escala_id')
              ->references('id')
              ->on('musica_escala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('musica_evento', function ($table) {
            $table->dropColumn('musica_escala_id');
        });
    }
}
