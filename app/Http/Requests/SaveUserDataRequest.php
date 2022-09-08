<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SaveUserDataRequest extends FormRequest
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
            'contact_name'=>['required', 'min:3', 'max:40',
                'not_regex:/[^(\w)|(\x7F-\xFF)|(\s)]/'],
            'phone'=>['required','min:5','max:20', 'regex:/[0-9]/'],
            'company_name'=>['nullable','max:100', 'not_regex:/[^(\w)|(\x7F-\xFF)|(\s)"-]/'],
            'address'=>['nullable','max:200', 'not_regex:/[^(\w)|(\x7F-\xFF)|(\s)".,]/'],
            'postcode'=>['nullable','max:6', 'regex:/[0-9]/'],
        ];
    }
}
