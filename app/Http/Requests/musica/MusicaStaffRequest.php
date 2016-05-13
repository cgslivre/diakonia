<?php

namespace App\Http\Requests\musica;

use App\Http\Requests\Request;

class MusicaStaffRequest extends Request
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
            'usuario' => 'integer|required',
            'servico' => 'array|required',
        ];
    }


    public function messages()
    {
        return [
            'usuario.required' => 'É necessário selecionar um usuário',
            'servico.required' => 'Selecione ao menos um serviço',
        ];
    }
}
