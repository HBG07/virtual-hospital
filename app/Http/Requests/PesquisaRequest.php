<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisaRequest extends FormRequest
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
            'CI_pesquisado'=>['min:11','max:11','regex:/[0-9]{2}(?:0[1-9]{1}|1[0-2]{1})(?:0[1-9]{1}|[12][0-9]{1}|3[01])[0-9]{5}/','required'],
            'nombre'=>'min:4|max:50|required',
            'primer_apellido'=>'min:4|max:50|required',
            'segundo_apellido'=>'min:4|max:50|required',
            'fecha'=>'date|required',
        ];
    }
}
