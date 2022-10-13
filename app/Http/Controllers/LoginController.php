<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        $credentials = $request->validated();
//        dd($credentials);
        if(!Auth::validate($credentials)){
            session()->flash('loginFailed');
            return back()->withErrors([
                'auth_failed' => 'Неверный логин или пароль',
            ]);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return Redirect::back();
    }
}
