<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CableGroupRequest extends FormRequest
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
            'title'=>'required|min:3|max:40',
            'description'=>'required|min:10|max:550',
            'image'=>'mimes:jpeg,jpg,png|max:5000',
            'files'=>'mimes:jpeg,jpg,png|max:5000',
        ];
    }
}
