<?php

use Illuminate\Database\Seeder;

class CategoriaEnsinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_ensino')->insert([
        ['id' => 1,'nome' => 'Comunhão com Deus'],
        ['id' => 2,'nome' => 'Andar na luz'],
        ['id' => 3,'nome' => 'Unidade da Igreja'],
        ['id' => 4,'nome' => 'Restauração da Verdade'],
        ['id' => 5,'nome' => 'Princípios Absolutos'],
        ['id' => 6,'nome' => 'Autoridade e Submissão'],
        ['id' => 7,'nome' => 'Relação entre irmãos'],
        ['id' => 8,'nome' => 'O Culto'],
        ['id' => 9,'nome' => 'Os Dons Espirituais e Serviços'],
        ['id' => 10,'nome' => 'Generosidade'],
        ['id' => 11,'nome' => 'Família'],
        ['id' => 12,'nome' => 'Juntas e Ligamentos'],
        ['id' => 13,'nome' => 'Proclamação'],
        ['id' => 14,'nome' => 'Reunião nas casas e gerais'],
        ['id' => 15,'nome' => 'Santificação'],
        ['id' => 16,'nome' => 'Segunda Vinda de Jesus'],
        ['id' => 17,'nome' => 'Apostilas'],
      ]);
    }
}
