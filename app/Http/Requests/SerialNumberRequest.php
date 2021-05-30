<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Request;

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
        // dd($this->equipment_id);
        return  [
            'equipment_id' => 'required|integer',
            'serial_number' => 'required|string|unique:serial_numbers,serial_number,NULL,id,equipment_id,' . $this->equipment_id
        ];
    }

    public function messages()
    {
        return [
            'serial_number.required' => 'Serijski broj je obavezan',
            'serial_number.unique' => 'Taj serijski broj već postoji'
        ];
    }
}
