<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RobotRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'speed' => 'required|numeric|between:0,9999.99',
            'weight' => 'required|numeric|between:0,9999.99',
            'power' => 'required|numeric|between:0,9999.99',
            'created_by' => 'required|integer',
            'updated_by' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Email is required!',
            'speed.required' => 'Name is required!',
            'weight.required' => 'Password is required!',
            'power.required' => 'Password is required!'
        ];
    }
}
