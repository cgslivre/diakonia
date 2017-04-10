<?php

use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_evento')->insert([
        [
            'id' => 1,
            'nome' => 'Encontro Geral'
        ],
        [
            'id' => 2,
            'nome' => 'Encontro Especial'
        ],
        [
            'id' => 3,
            'nome' => 'Retiro'
        ],

      ]);
    }
}
