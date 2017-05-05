<?php

use Illuminate\Database\Seeder;

class RegioesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('regioes')->insert([
        ['nome'=>'Asa Norte','created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Asa Sul', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Brazlândia','created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Candangolândia','created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Ceilândia', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Cruzeiro', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Estrutural','created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Fercal', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Formosa (GO)', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Gama', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Granja do Torto', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Guará', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Goiânia', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Itapoã', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Jardim Botânico', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Jardim Mangueiral', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Lago Norte', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Lago Sul', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Noroeste', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Núcleo Bandeirante', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Octogonal', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Paranoá', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Park Sul', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Park Way', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Planaltina', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Recanto das Emas', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Riacho Fundo', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Samambaia', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Santa Maria', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'SIA', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Sobradinho', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Sudoeste', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'São Sebastião', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Taguatinga', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Valparaíso de Goiás', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Varjão', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Vicente Pires', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Vila Planalto', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()],
        ['nome'=>'Águas Claras', 'created_at' => \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()]
    ]);
    }
}
