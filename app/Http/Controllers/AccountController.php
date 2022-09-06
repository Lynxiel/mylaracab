<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SaveUserDataRequest;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Hash;

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

        return view('account.index',compact('cart', 'orders', 'user'));
    }

    public function deleteAccount(){

        if (!isset(auth()->user()->id)) {return redirect()->intended('/'); }
        $user_id = auth()->user()->id;

        // Delete user orders
        $oorder = new Order;
        $orders = Order::GetUserOrders($user_id);
        if (isset($orders[0]))
            foreach ($orders as $order) {
                $oorder->cancelOrder($order->order_id);
        }
        // Delete user
        $user = new User();
        $user->DeleteUser($user_id);

        return redirect('/');
    }

    public function saveUserData(SaveUserDataRequest $request){
        $data = $request->validated();
        User::where('id', auth()->user()->id)
            ->update([
            'contact_name' => $data['contact_name'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
        ]);
        return redirect('account/');
    }
}
