<?php

namespace App\Http\Requests\material;

use App\Http\Requests\Request;
use Log;

class EnsinoRequest extends Request
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
            $rules['titulo'] = 'required|min:2|unique:ensinos';
            $rules['slug'] = 'required|min:2|alpha_dash|unique:ensinos';
        } else{
            $rules['titulo'] = 'required|min:2|unique:ensinos,titulo,'.$this->id.',id';
            $rules['slug'] = 'required|min:2|alpha_dash|unique:ensinos,slug,'.$this->id.',id';
        }

        $rules['arquivo'] = 'required|file|mimes:pdf|max:7000';
        $rules['categoria_ensino_id'] = 'required';

        return $rules;
    }


    public function messages()
    {
        return [
            'titulo.required' => 'É necessário informar um título para o ensino',
            'titulo.min' => 'O título deve ter pelo menos 2 caracteres',
            'slug.required' => 'É necessário informar um identificador para o ensino',
            'slug.min' => 'O identificador deve ter pelo menos 2 caracteres',
            'categoria_ensino_id.required' => 'Escolha uma categoria para o material de ensino',
            'arquivo.mimes' => 'O arquivo deve ser PDF',
            'arquivo.max' => 'O arquivo não deve ultrapassar 7MB',
        ];
    }



}
