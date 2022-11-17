<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Http\Requests\SaveUserDataRequest;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\RecoverRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Return the view with logged user information
     * @param AccountRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show(AccountRequest $request)
    {
        $user = auth()->user();

        //Cart
        $cart = CartController::get();
        //Orders
        $orders = Order::with('cables')
            ->orderByDesc('created_at')
            ->where('user_id','=',$user->id)
            ->paginate(10);


        return view('account',compact('cart',  'user', 'orders'));
    }

    public function delete(){

        $user_id = auth()->user()->id;
        // Unbind user orders but save them for statistics
        Order::where('user_id', '=', $user_id)
            ->update(['user_id'=> null, 'comment'=>'Пользователь удалил свой аккаунт']);
        // Delete user
        User::where('id', '=', $user_id)->delete();
        session()->flash('AccountDeleted');
        return redirect('/');
    }

    public function save(SaveUserDataRequest $request){
        $data = $request->validated();
        User::findOrFail(auth()->user()->id)->update($data);
        return Redirect::route('account.show');
    }

    public function recover(RecoverRequest $request){

        $email = $request->input('email');
        $random_password = strtolower(Str::random(8));
        $user = User::where('email','=',$email)->firstOrFail();
        $user->update( ['password' => Hash::make($random_password)] );
        MailController::passwordChanged($user, $random_password);
        session()->flash( 'PasswordChanged');
        session()->flash('emailrecover', $email);
        return Redirect::back();
    }

}
