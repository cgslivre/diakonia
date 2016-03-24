<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioUpdateRequest extends Request
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
            'name' => 'required|min:2',
            'telefone' => 'required|integer',
            'avatar' => 'image'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome deve ter no mínimo 2 caracteres',
            'name.min' => 'O nome deve ter no mínimo 2 caracteres',
            'avatar.image' => 'O arquivo deve ser uma imagem'
        ];
    }
}
