<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->date('data_nascimento');
            $table->string('sexo',1);
            $table->string('regiao');

            $table->string('endereco')->nullable();
            $table->string('email')->nullable();
            $table->string('telefones')->nullable();
            $table->string('avatar_path')->nullable();

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('membros');
    }
}
