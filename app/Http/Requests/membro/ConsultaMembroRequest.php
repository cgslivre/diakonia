<?php

namespace App\Http\Requests\membro;

use App\Http\Requests\Request;
use Carbon\Carbon;

class ConsultaMembroRequest extends Request
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
        $rules = $this->rules;
        if(empty($this->id)){
            $rules['titulo'] = 'required|min:2|unique:consulta_membros';
            $rules['slug'] = 'required|min:2|alpha_dash|unique:consulta_membros';
        } else{
            $rules['titulo'] = 'required|min:2|unique:consulta_membros,titulo,'.$this->id.',id';
            $rules['slug'] = 'required|min:2|alpha_dash|unique:consulta_membros,slug,'.$this->id.',id';
        }
        $rules['tem_discipulos'] = 'in:S,N';
        $rules['tem_discipulador'] = 'in:S,N';
        $rules['sexo'] = 'in:M,F';
        $rules['idade_minima'] = 'integer';
        $rules['idade_maxima'] = 'integer';


        return $rules;
    }


    public function messages()
    {
        return [
            'titulo.required' => 'É necessário informar o título da consulta',
            'slug.required' => 'É necessário informar um Identificador para a consulta',
            'slug.unique' => 'Identificador já está em uso',
            'slug.alpha_dash' => 'Formato inválido para o Identificador',

        ];
    }


}
