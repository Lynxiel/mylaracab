<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Return the view with logged user information
     * @param AccountRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index(AccountRequest $request)
    {
        //cart
        $cart=array();
        $ids = CartController::getCartList($request);
        if ($ids) $cart = Cable::getCablesList($ids);

        return view('account.index',compact('cart'));
    }
}
