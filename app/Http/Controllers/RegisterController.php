<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->only(['email','phone','password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        auth()->login($user, true);
        //Send registration email
        MailController::accountRegister($data['email'], $data['password'], $data['phone']);
        session()->flash('UserRegistered');
        return Redirect::back();
    }


}
