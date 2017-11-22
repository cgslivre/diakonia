<?php

namespace App\Http\Requests\musica;

use App\Http\Requests\Request;

class ColaboradorMusicaRequest extends Request
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
            // Criação
            $rules['user_id'] = 'required|unique:colaboradores_musica';
        } else{
            // Atualização
            $rules['user_id'] = 'unique:colaboradores_musica,user_id,'.$this->id.',id';
        }
        $rules['servico'] = 'array|required';

        return $rules;
    }


    public function messages()
    {
        return [
            'user_id.required' => 'É necessário selecionar um usuário',
            'user_id.unique' => 'Usuário já cadastrado como colaborador',
            'servico.required' => 'Selecione ao menos um serviço',
        ];
    }

    public function all($keys = null){
        $input = parent::all();

        if( array_key_exists('lider', $input)
            && ($input['lider'] == 'on') ){
                $input['lider'] = true;
        } else{
                $input['lider'] = false;
        }


        return $input;
    }


}
