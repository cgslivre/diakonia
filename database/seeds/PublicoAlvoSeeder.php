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
        ['id' => 1,'nome' => 'Geral'],
        ['id' => 2,'nome' => 'Homens'],
        ['id' => 3,'nome' => 'Mulheres'],
        ['id' => 4,'nome' => 'Jovens'],
        ['id' => 5,'nome' => 'Líderes'],
        ['id' => 6,'nome' => 'Discipuladores'],
        ['id' => 7,'nome' => 'Casais'],
        ['id' => 8,'nome' => 'Crianças'],
        ['id' => 9,'nome' => 'Família'],

      ]);
    }
}
