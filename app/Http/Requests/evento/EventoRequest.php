<?php

namespace App\Http\Requests\evento;

use App\Http\Requests\Request;
use Log;
use Carbon\Carbon;

class EventoRequest extends Request
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

        $rules['titulo'] = 'required|min:2';
        $rules['data_hora_inicio'] = 'required';
        $rules['data_hora_fim'] = 'required|after:data_hora_inicio';
        $rules['local_id'] = 'required';
        $rules['publico_alvo_id'] = 'required';
        $rules['tipo_evento_id'] = 'required';

        return $rules;
    }


    public function messages()
    {
        return [
            'titulo.required' => 'É necessário informar um título para o evento',
            'data_hora_inicio.required' => 'É necessário informar a data e hora de início',
            'data_hora_fim.required' => 'É necessário informar a data e hora final do evento',
            'data_hora_fim.after' => 'A hora não pode ser anterior ao início do evento',
            'local_id.required' => 'É necessário informar um local',
            'publico_alvo_id.required' => 'É necessário informar um público alvo',
            'tipo_evento_id.required' => 'É necessário informar o tipo do evento',
        ];
    }

    public function all($keys = null){
        $input = parent::all();

        if($input['data_hora_inicio']){
            $input['data_hora_inicio'] = Carbon::createFromFormat('j/n/Y G:i', $input['data_hora_inicio'])
                ->format('Y-m-d H:i:s');
        }

        if($input['data_hora_fim']){
            $input['data_hora_fim'] = Carbon::createFromFormat('j/n/Y G:i', $input['data_hora_fim'])
                ->format('Y-m-d H:i:s');
        }

        return $input;
    }


}
