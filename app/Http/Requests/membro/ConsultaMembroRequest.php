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
        } else{
            $rules['titulo'] = 'required|min:2|unique:consulta_membros,titulo,'.$this->id.',id';
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'titulo.required' => 'É necessário informar o título da consulta',

        ];
    }


}
