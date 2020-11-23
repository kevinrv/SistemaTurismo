<?php

namespace sisTurismo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenciasFormRequest extends FormRequest
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
            'nombre'=>'required|max:60',
            'direccion'=>'required|max:60',
            'descripcion'=>'max:100',
            'email'=>'max:60'
        ];
    }
}
