<?php

namespace App\Http\Requests\Admin;

use App\Models\Cable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title'=>['required','max:200', Rule::unique('cables')->ignore($this->route('cable'))],
            'group_id'=>'nullable|exists:groups,id',
            'footage'=>['nullable','regex:/^[+]?\d+$/'],
            'instock'=>['regex:/^[+]?\d+$/'],
            'price'=>['regex:/^(?:[1-9]\d*|0)?(?:\.\d+)?$/'],

        ];
    }
}
