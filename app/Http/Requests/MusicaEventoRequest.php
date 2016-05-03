<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

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
            'hora' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'titulo.min' => 'O título deve ter no mínimo 3 caracteres',
            'hora.required' => 'A data e hora são obrigatórias'
        ];
    }

    protected function getValidatorInstance()
    {

        // Add new data field before it gets sent to the validator
        $this->merge(array('modified_by' => Auth::user()->id ));
        $this->merge(array('created_by' => Auth::user()->id ));

        // OR: Replace ALL data fields before they're sent to the validator
        // $this->replace(array('date_of_birth' => 'test'));

        // Fire the parent getValidatorInstance method
        return parent::getValidatorInstance();

    }

}
