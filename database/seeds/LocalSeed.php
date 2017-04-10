<?php

use Illuminate\Database\Seeder;

class LocalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {

        DB::table('local')->delete();

        DB::table('local')->insert([
            'id' => 1,
            'nome' => 'Prédio Congregação',
            'slug' => 'predio-congregacao',
            'endereco' => 'SCRS Quadra 2 - Área Especial E',
            'uf' => 'DF',
            'cidade' => 'Cruzeiro',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'localizacao' => '{"latitude":-15.789857,"longitude":-47.941400}'
        ]);

        DB::table('local')->insert([
          'id' => 2,
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
