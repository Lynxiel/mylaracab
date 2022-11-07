<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(!Auth::validate($credentials)){
            session()->flash('loginFailed');
            return back()->withErrors([
                'auth_failed' => 'Неверный логин или пароль',
            ]);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return route('admin.index');
    }


    public function admin()
    {
        return view('admin.auth');
    }
}
