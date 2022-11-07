<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoverRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        return [
            'email'=>['required','email:rfc,dns,strict', 'not_regex:/[^(\w)|(\@)|(\.)|(\-)]/', 'exists:App\Models\User,email'],
        ];
    }
}
