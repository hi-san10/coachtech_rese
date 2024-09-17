<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => ['require'],
            'time' => ['require'],
            'number' => ['require']
        ];
    }

    public function messages()
    {
        return [
            'date.require' => '日付を選択してください',
            'time.require' => '時間を選択してください',
            'number.require' => '人数を選択してください'
        ];
    }
}
