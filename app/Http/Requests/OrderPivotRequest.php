<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sabberworm\CSS\Rule\Rule;

class OrderPivotRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cable_id'=>['required', 'exists:App\Models\Cable,id'],
            'quantity'=> ['nullable','numeric'],

        ];
    }
}
