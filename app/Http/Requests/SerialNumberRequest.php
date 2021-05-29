<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerialNumberRequest extends FormRequest
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
        return  [
            'equipment_id' => 'required|integer',
            'serial_number' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'serial_number.required' => 'Serijski broj je obavezan',
        ];
    }
}
