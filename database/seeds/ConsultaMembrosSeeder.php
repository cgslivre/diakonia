<?php

use Illuminate\Database\Seeder;

class ConsultaMembrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-discipuladores',
            'titulo' => 'Todos os discipuladores',
            'tem_discipulos' => 'S',
            'consulta_publica' => true,
            'created_by' => 1,
            'modified_by' => 1
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-que-nao-tem-discipuladores',
            'titulo' => 'Sem discipulador(a) (acima de 12 anos)',
            'tem_discipulador' => 'N',
            'consulta_publica' => true,
            'idade_minima' => 12,
            'created_by' => 1,
            'modified_by' => 1
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-que-nao-sao-discipuladores',
            'titulo' => 'Todos os que não são discipuladores (acima de 12 anos)',
            'tem_discipulos' => 'N',
            'consulta_publica' => true,
            'idade_minima' => 12,
            'created_by' => 1,
            'modified_by' => 1
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'criancas-3-a-11-anos',
            'titulo' => 'Crianças (3 a 11 anos)',
            'idade_minima' => 3,
            'idade_maxima' => 11,
            'consulta_publica' => true,
            'created_by' => 1,
            'modified_by' => 1
        ]
      ]);
    }
}
