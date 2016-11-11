<?php

namespace App\Http\Requests\membro;

use App\Http\Requests\Request;

class MembroRequest extends Request
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
            'nome' => 'required|min:2',
            'sexo' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'nome.required' => 'É necessário informar o nome da pessoa',
            'nome.min' => 'O nome precisa ter no mínimo 2 caracteres',
            'sexo.required' => 'É necessário informar o sexo da pessoa',
        ];
    }

}
