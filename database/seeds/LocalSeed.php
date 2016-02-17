<?php

use Illuminate\Database\Seeder;

class LocalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('local')->insert([
          'nome' => 'Chácara da Congregação',
          'slug' => 'chacara-congregacao',
          'uf' => 'GO',
          'cidade' => 'Alexânia',
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now(),
          'localizacao' => '{"latitude":-16.082648,"longitude":-48.471833}'
      ]);
    }
}
