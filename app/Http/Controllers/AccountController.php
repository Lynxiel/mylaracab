<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SaveUserDataRequest;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class AccountController extends Controller
{
    /**
     * Return the view with logged user information
     * @param AccountRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index(AccountRequest $request)
    {
        //User
        $user = User::GetUser(auth()->user()->id);
        //Cart
        $cart=CartController::init($request);
        //Orders
        $orders = Order::GetUserOrders(auth()->user()->id);

       //dd($orders);

        return view('account.index',compact('cart', 'orders', 'user'));
    }

    public function deleteAccount(){

        $user_id = auth()->user()->id;
        // Unbind user orders but save them for statistics
        Order::where('user_id', '=', $user_id)
            ->update(['user_id'=> null, 'comment'=>'Пользователь удалил свой аккаунт']);
        // Delete user
        User::where('id', '=', $user_id)->delete();
        session()->flash('AccountDeleted');
        return redirect('/');
    }

    public function saveUserData(SaveUserDataRequest $request){
        $data = $request->validated();
        User::where('id', auth()->user()->id)
            ->update([
            'contact_name' => $data['contact_name'],
            'company_name' => $data['company_name'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
        ]);
        return Redirect::back();
    }

    public function recoverPassword(Request $request){
        $rules = ['email'=>['required','email:rfc,dns,strict', 'not_regex:/[^(\w)|(\@)|(\.)|(\-)]/']];
        $data = $request->only('email');
        $validator = Validator::make($data, $rules );
        if ($validator->fails()) {
            session()->flash('recoveryFailed');
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $user = User::where('email', '=' , $data['email'])->first();
        if (!$user){
            session()->flash('recoveryFailed');
            return back()->withErrors([
                'email' => 'Email '.$data['email'].' не найден',
                'user_not_found' => true
            ]);
        }

        $random_password = strtolower(Str::random(8));
        $user->update(
            ['password' => Hash::make($random_password)]
        );

        MailController::passwordChanged($user, $random_password);
        session()->flash('success', 'PasswordChanged');
        session()->flash('emailrecover', $data['email']);
        return Redirect::back();
    }
}
