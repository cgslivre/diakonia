<?php

use Illuminate\Database\Seeder;

class PublicoAlvoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publico_alvo')->insert([
        ['id' => 1,'nome' => 'Geral', 'slug'=>'geral'],
        ['id' => 2,'nome' => 'Homens', 'slug'=>'homens'],
        ['id' => 3,'nome' => 'Mulheres', 'slug'=>'mulheres'],
        ['id' => 4,'nome' => 'Jovens', 'slug'=>'jovens'],
        ['id' => 5,'nome' => 'Líderes', 'slug'=>'lideres'],
        ['id' => 6,'nome' => 'Discipuladores', 'slug'=>'discipuladores'],
        ['id' => 7,'nome' => 'Casais', 'slug'=>'casais'],
        ['id' => 8,'nome' => 'Crianças', 'slug'=>'criancas'],
        ['id' => 9,'nome' => 'Família', 'slug'=>'familia'],

      ]);
    }
}
