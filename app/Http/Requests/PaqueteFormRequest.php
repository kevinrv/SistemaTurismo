<?php

namespace sisTurismo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaqueteFormRequest extends FormRequest
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
            'precio'=>'required|between:0,999.999',
            'personas'=>'required|numeric',
            'descuento'=>'required|between:0,99.99',
            'idlugar_turistico'=>'required',
            'idagencias'=>'required'
        ];
    }
}
