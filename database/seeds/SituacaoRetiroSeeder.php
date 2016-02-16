<?php

use Illuminate\Database\Seeder;

class SituacaoRetiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('situacao_retiro')->insert([
      [
          'id' => 1,
          'descricao' => 'Inscrições Abertas'
      ],
      [
          'id' => 2,
          'descricao' => 'Inscrições Encerradas'
      ],
      [
          'id' => 3,
          'descricao' => 'Inscrições em Breve'
      ]
    ]);
    }
}
