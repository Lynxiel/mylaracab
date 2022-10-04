<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use App\Models\Cable;
use http\Env\Response;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     *
     * Return cart data for view
     *
     */
    public static function init(Request $request)
    {
        $cart=array();
        $ids = self::getCartList($request);
        if ($ids)
            return  Cable::getCablesList(array_keys($ids));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add product to cart and store it in session
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function  addToCart(Request $request){

        $cart_list = array();
        $cable_id = $request->input("cable_id");

        if ($cable_id){
            $current_list = $this->getCartList($request);
            if ($current_list) $cart_list = $current_list;
            $cart_list[$cable_id] = 100; //initial quantity
            //dd($cart_list);
            $request->session()->put('cable_id',$cart_list);
            //dd($request->session()->get('cable_id'));
            session()->flash('success', 'Успешно добавлено в корзину!');
            $cart  = self::init($request);
            return view('partials.cart', compact('cart'));
        }

    }

    protected static function  getCartList(Request $request){
        $cart_list = $request->session()->get('cable_id');
        //dd($cart_list);
        return $cart_list;
    }

    public function updateQuantity(Request $request){

        $cable_id = (int)$request->input("cable_id");
        $quantity = (int)$request->input("quantity");

        if ($quantity==0) {
            $this->removeFromCart($request);
        }

        $cart_list = $request->session()->get('cable_id');
        $cart_list[$cable_id] = $quantity;
        //dd($cart_list);
        $request->session()->remove('cable_id');
        $request->session()->put('cable_id',$cart_list);

        session()->flash('success', 'Успешно изменено количество!');
        return redirect()->intended('/');

    }

    public function removeFromCart(Request $request){
        $cart_list = array();
        $cable_id = $request->input("cable_id");

        if ($cable_id){
            $cart_list = $this->getCartList($request);
            unset($cart_list[$cable_id]);
            $request->session()->remove('cable_id');
            $request->session()->put('cable_id',$cart_list);
            //dd($request->session()->get('cable_id'));
            session()->flash('success', 'Успешно удалено из корзины!');
            return redirect()->intended('/');
        }
    }


}
