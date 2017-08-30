<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuertasActualizarRequest extends FormRequest
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
            'puerta_especial' => 'required',
            'nombre' =>'required|min:5|alpha_dash',
            'llave_rfid' => 'required|max:9|alpha_num|regex:/^[0-9a-eA-E]+$/',
            'ip' => 'required|ip',
        ];
    }
}
