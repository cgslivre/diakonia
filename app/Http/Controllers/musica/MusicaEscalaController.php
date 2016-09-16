<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Model\musica\MusicaEvento;
use App\Model\musica\MusicaStaff;
use App\Model\musica\MusicaServico;
use App\Model\musica\MusicaEscalaServico;
use App\Http\Requests\musica\MusicaEscalaRequest;
use Illuminate\Support\Facades\Redirect;

class MusicaEscalaController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create( $evento_id ){
        $evento = MusicaEvento::findOrFail($evento_id);
        $lideres = MusicaStaff::lideres()->get();

        return view('musica.escala.create', compact('evento','lideres'));
    }

    public function analiseEscala( $id, MusicaEscalaRequest $request ){
        $evento = MusicaEvento::findOrFail($id);
        $validator = Validator::make($request->all(), []);
        $validator->after(function($validator) {
            $data = $validator->getData();

            if (empty($data['servico-1'])
                && empty($data['servico-2'])
                && empty($data['servico-3'])
                && empty($data['servico-4'])
                && empty($data['servico-5'])
                && empty($data['servico-6'])
                && empty($data['servico-7'])
                && empty($data['servico-8'])) {
                $validator->errors()
                    ->add('servico', 'Escale pelo menos uma pessoa para um serviço.');
            }
        });
        if ($validator->fails()) {
            return Redirect::route('musica.escala.create',[$id])
                ->withErrors($validator)
                ->withInput();
        }else{
            $data =  $request->all();
            $warnings = $request->warnings();
            $servicos = MusicaServico::all();
            $lider = MusicaStaff::findOrFail($data['lider']);
            return view('musica.escala.analise', compact('warnings','data','evento','lider','servicos'));
        }

    }

    private function salvarEscala( $id, $data ){
        $escala = new MusicaEscala;
        $escala->lider_id = $data['lider'];
        $escala->save();

        if( !empty($data['servico-1'])){
            foreach ($data['servico-1'] as $staff) {
                $escalaServico = new MusicaEscalaServico;
                //$escalaServico
            }


        }
    }

}
