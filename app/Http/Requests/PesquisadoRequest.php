<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisadoRequest extends FormRequest
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
            // agregar regex CI
            'CI'=>'min:11|max:11|required',
            'nombre'=>'min:4|max:50|required',
            'primer_apellido'=>'min:4|max:50|required',
            'segundo_apellido'=>'min:4|max:50|required'
        ];
    }
}
