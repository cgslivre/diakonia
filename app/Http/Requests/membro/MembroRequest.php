<?php

namespace App\Http\Requests\membro;

use App\Http\Requests\Request;
use Carbon\Carbon;

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
            'data_nascimento' => 'required|date_format:"Y-n-j"|before:today'
        ];
    }


    public function messages()
    {
        return [
            'nome.required' => 'É necessário informar o nome da pessoa',
            'nome.min' => 'O nome precisa ter no mínimo 2 caracteres',
            'sexo.required' => 'É necessário informar o sexo da pessoa',
            'data_nascimento.required' => 'É necessário informar a data de nascimento',
            'data_nascimento.before' => 'Data de nascimento inválida',
            'data_nascimento.date_format' => 'Data de nascimento inválida: Utilize o formato dd/mm/AAAA',
        ];
    }

    public function all(){
        $input = parent::all();
        try{
            $input['data_nascimento'] = Carbon::createFromFormat('j/n/Y', $input['data_nascimento'])
                ->format('Y-m-d');
        } catch(InvalidArgumentException $x){}
        return $input;
    }


}
