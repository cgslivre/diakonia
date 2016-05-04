<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Carbon\Carbon;

class MusicaEventoRequest extends Request
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
            'titulo' => 'required|min:3',
            'hora' => 'required|unique:musica_evento,hora,'.$this->get('id').',id',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'titulo.min' => 'O título deve ter no mínimo 3 caracteres',
            'hora.required' => 'A data e hora são obrigatórias',
            'hora.unique' => 'Já existe um evento cadastrado nesta data',
        ];
    }

    public function all(){
        $input = parent::all();
        $input['hora'] = Carbon::createFromFormat('j/n/Y G:i', $input['hora'])->format('Y-m-d H:i:s');
        return $input;
    }

}
