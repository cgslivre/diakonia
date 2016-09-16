<?php

namespace App\Http\Requests\musica;

use App\Http\Requests\Request;

class MusicaEscalaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lider' => 'required',
        ];
    }

    public function warnings(){
        $data =  $this->all();

        $warnings = collect();

        // Voz
        if( empty($data['servico-1'])){
            $warnings->push(['servico-1' => 'Nenhum(a) vocalista selecionado(a).']);
        }
        // Violão
        if( empty($data['servico-2'])){
            $warnings->push(['servico-2' => 'Ninguém escalado para tocar violão.']);
        }
        // Violão
        if( empty($data['servico-4'])){
            $warnings->push(['servico-4' => 'Ninguém escalado para tocar baixo.']);
        } else if( count($data['servico-4']) > 1) {
            $warnings->push(['servico-4' => 'Mais de uma pessoa escalada para tocar baixo.']);
        }

        // Teclado
        if( !empty($data['servico-5']) && count($data['servico-5']) > 1){
            $warnings->push(['servico-5' => 'Mais de uma pessoa escalada para tocar teclado.']);
        }

        // Bateria
        if( !empty($data['servico-6']) && count($data['servico-6']) > 1){
            $warnings->push(['servico-6' => 'Mais de uma pessoa escalada para tocar bateria.']);
        }

        // Mesa de Som
        if( empty($data['servico-7'])){
            $warnings->push(['servico-7' => 'Ninguém escalado para mesa de som.']);
        } else if( count($data['servico-7']) > 1) {
            $warnings->push(['servico-7' => 'Mais de uma pessoa escalada para mesa de som.']);
        }

        // Projeção
        if( empty($data['servico-8'])){
            $warnings->push(['servico-8' => 'Ninguém escalado para projeção.']);
        } else if( count($data['servico-8']) > 1) {
            $warnings->push(['servico-8' => 'Mais de uma pessoa escalada para projeção.']);
        }
        //dd( $data);
        return $warnings;
    }
}
