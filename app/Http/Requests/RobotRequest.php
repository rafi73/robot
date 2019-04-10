<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string required The name of the Robot.
 * @bodyParam speed float required The speed of the Robot.
 * @bodyParam weight float required The weight of the Robot.
 * @bodyParam power float required The power of the Robot.
 */
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
}
