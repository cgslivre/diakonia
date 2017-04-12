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
        ['id' => 1,'slug'=>'encontro-geral','nome' => 'Encontro Geral'],
        ['id' => 2,'slug'=>'encontro-especial','nome' => 'Encontro Especial'],
        ['id' => 3,'slug'=>'retiro','nome' => 'Retiro'],
      ]);
    }
}
