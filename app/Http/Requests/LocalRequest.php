<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Log;

class LocalRequest extends Request
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

            $rules['slug'] = 'required|min:2|alpha_dash|unique:local';
        } else{
            $rules['slug'] = 'required|min:2|alpha_dash|unique:local,slug,'.$this->id.',id';
        }
        $rules['nome'] = 'required|min:2';

        return $rules;
    }


    public function messages()
    {
        return [
            'nome.required' => 'É necessário informar o nome do local',
            'slug.required' => 'É necessário informar um Identificador para o local',
            'slug.unique' => 'Identificador já está em uso',
            'slug.alpha_dash' => 'Formato inválido para o Identificador',
        ];
    }

    public function all($keys = null){
        $input = parent::all();

        $loc = [];
        $loc['latitude'] = $input['latitude'];
        $loc['longitude'] = $input['longitude'];
        if(empty($loc['latitude']) && empty( $loc['longitude'])){
            $input['localizacao'] = null;
        } else{
            $input['localizacao'] = json_encode($loc);
        }
        //$input['telefone'] = preg_replace("/[^0-9]/","",$input['telefone']);

        return $input;
    }


}
