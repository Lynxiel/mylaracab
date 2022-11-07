<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{

    public function update(PasswordRequest $request)
    {
        $data = $request->validated();
        $user =  auth()->user();
        $user->fill(['password'=>Hash::make($data['new_password'])])->save();
        MailController::passwordChanged($user,$data['new_password'] );
        session()->flash('PasswordChanged');
        return redirect()->route('account.show');


    }


}
