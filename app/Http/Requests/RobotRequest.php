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
            'power' => 'required|numeric|between:0,9999.99'
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => __('robot.invalid_name'),
            // 'speed.required' => __('robot.invalid_speed'),
            // 'weight.required' => __('robot.invalid_weight'),
            // 'power.required|numeric|between:0,9999.99' => __('robot.invalid_power'),
            // 'speed.numeric' => __('robot.numeric_speed'),
            // 'weight.numeric' => __('robot.numeric_weight'),
            // 'power.numeric' => __('robot.numeric_power'),
        ];
    }
}
