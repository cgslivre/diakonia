<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaoRetiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('inscricao_retiro', function (Blueprint $table) {
          $table->increments('id');

          $table->timestamps();
          $table->softDeletes();

          $table->string('nome')->unique();
          $table->string('email');
          $table->string('telefone');
          $table->date('data_nascimento');
          $table->char('sexo',1);

          $table->string('cidade');
          $table->char('uf',2)->nullable();
          $table->string('regiao');

          //outro grupo
          $table->string('outro_grupo')->nullable();
          $table->string('convidado_por')->nullable();

          $table->timestamp('data_confirmacao')->nullable();

          $table->text('observacao_inscrito')->nullable();
          $table->text('observacao_administracao')->nullable();

          $table->boolean('isento')->default(false);
          $table->boolean('pagamento_completo')->default(false);



      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscricao_retiro');
    }
}
