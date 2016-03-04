<?php

use Illuminate\Database\Seeder;

class GrupoInscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('grupo_inscricao')->insert([
      [
          'nome' => 'Alfredo'

      ],
      [
          'nome' => 'André / Victor / Pedro'
      ],
      [
          'nome' => 'Elton'
      ],
      [
          'nome' => 'Fabiano / Gerson'
      ],
      [
          'nome' => 'Fernando'
      ],
      [
          'nome' => 'Marcelo / Gustavo'
      ],
      [
          'nome' => 'Maurício'
      ],
      [
          'nome' => 'Rick / Marcelo'
      ],
      [
          'nome' => 'Vinícius'
      ]
    ]);
    }
}
