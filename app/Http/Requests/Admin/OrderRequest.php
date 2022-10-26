<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OrderRequest extends FormRequest
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
            'status'=>['size:1'],
            'comment'=>['nullable','max:200'],
            'address'=>['nullable','max:200', 'not_regex:/[^(\w)|(\x7F-\xFF)|(\s)".,]/'],
            'pay_link'=>['nullable','max:100'],
        ];
    }
}
