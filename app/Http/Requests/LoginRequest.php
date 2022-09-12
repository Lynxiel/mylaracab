<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'emailorphone' => ['required', 'not_regex:/[^(\w)|(\@)|(\.)|(\-)][0-9]/'],
            'password' => 'required'
        ];
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getCredentials()
    {
        $emailorphone = $this->get('emailorphone');

        if ($this->isEmail($emailorphone)) {
            return [
                'email' => $emailorphone,
                'password' => $this->get('password')
            ];
        }

        else return [
            'phone' => $emailorphone,
            'password' => $this->get('password')
        ];
    }

    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['emailorphone' => $param],
            ['emailorphone' => 'email']
        )->fails();
    }
}
