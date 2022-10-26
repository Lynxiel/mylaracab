<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CableRequest extends FormRequest
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
            'title'=>['required','max:200', 'not_regex:/[^(\w)|(\x7F-\xFF)|(\s)".,]/'],
            'cable_group_id'=>'nullable|exists:cable_groups',
            'footage'=>['regex:/^[+]?\d+$/'],
            'instock'=>['regex:/^[+]?\d+$/'],
            'price'=>['regex:/^[+]?\d+$/'],

        ];
    }
}
