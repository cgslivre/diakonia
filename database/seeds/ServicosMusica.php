<?php

use Illuminate\Database\Seeder;

class ServicosMusica extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos_musica')->insert([
        ['id' => 1,'descricao' => 'Vocal','img' => 'img/musica/voz'],
        ['id' => 2,'descricao' => 'Violão','img' => 'img/musica/violao'],
        ['id' => 3,'descricao' => 'Guitarra','img' => 'img/musica/guitarra'],
        ['id' => 4,'descricao' => 'Baixo','img' => 'img/musica/baixo'],
        ['id' => 5,'descricao' => 'Teclado','img' => 'img/musica/teclado'],
        ['id' => 6,'descricao' => 'Bateria','img' => 'img/musica/bateria'],
        ['id' => 7,'descricao' => 'Mesa de som','img' => 'img/musica/mesa'],
        ['id' => 8,'descricao' => 'Projeção','img' => 'img/musica/projecao']
      ]);
    }
}
