<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoRequest extends FormRequest
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
            'sigla' => 'required|max:2',
            'descricao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sigla.required' => 'A sigla deve ser informada.',
            'descricao.required' => 'A descrição deve ser informada.'
        ];
    }
}
