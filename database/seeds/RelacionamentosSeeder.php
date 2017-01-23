<?php

use Illuminate\Database\Seeder;

class RelacionamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relacionamentos')->insert([
        [
            'id' => 1,
            'desc_geral' => 'pai-mae',
            'desc_masc' => 'pai',
            'desc_fem' => 'mãe',
            'categoria' => 'familia',
            'rel_inverso_id' => 3
        ],
        [
            'id' => 2,
            'desc_geral' => 'irmao',
            'desc_masc' => 'irmão',
            'desc_fem' => 'irmã',
            'categoria' => 'familia',
            'rel_inverso_id' => 2
        ],
        [
            'id' => 3,
            'desc_geral' => 'filho',
            'desc_masc' => 'filho',
            'desc_fem' => 'filha',
            'categoria' => 'familia',
            'rel_inverso_id' => 1
        ],
        [
            'id' => 4,
            'desc_geral' => 'conjuge',
            'desc_masc' => 'marido',
            'desc_fem' => 'esposa',
            'categoria' => 'familia',
            'rel_inverso_id' => 4
        ],
        [
            'id' => 5,
            'desc_geral' => 'discipulo',
            'desc_masc' => 'discípulo',
            'desc_fem' => 'discípula',
            'categoria' => 'igreja',
            'rel_inverso_id' => 6
        ],
        [
            'id' => 6,
            'desc_geral' => 'discipulador',
            'desc_masc' => 'discipulador',
            'desc_fem' => 'discipuladora',
            'categoria' => 'igreja',
            'rel_inverso_id' => 5
        ],
      ]);
    }
}
