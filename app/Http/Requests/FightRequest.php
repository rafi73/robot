<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam contestant_robot_id int required Contestant Robot id (Robot belongs to the current logged in User).
 * @bodyParam opponent_robot_id int required Opponent Robot id (Robot belongs to the other User).
 */
class FightRequest extends FormRequest
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
            'contestant_robot_id' => 'required|integer',
            'opponent_robot_id' => 'required|integer',
        ];
    }
}
