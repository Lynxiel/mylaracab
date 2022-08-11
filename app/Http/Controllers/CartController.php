<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        return view('layouts.cart')->compact('cart', $cart);
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
            $cart_list[] = $cable_id;
           // dd($cart_list);
            $request->session()->put('cable_id',$cart_list);
            //dd($request->session()->get('cable_id'));
            session()->flash('success', 'Успешно добавлено в корзину!');
            return redirect()->intended('/');
        }

    }

    static  function getCartList(Request $request){
        $cart_list = $request->session()->get('cable_id');
        return $cart_list;
    }

    public function removeFromCart(Request $request){
        $cart_list = array();
        $cable_id = $request->input("cable_id");

        if ($cable_id){
            $cart_list = $this->getCartList($request);
            if (($key = array_search($cable_id, $cart_list)) !== false) {
                unset($cart_list[$key]);
            }
            $request->session()->remove('cable_id');
            $request->session()->put('cable_id',$cart_list);
            //dd($request->session()->get('cable_id'));
            session()->flash('success', 'Успешно удалено из корзины!');
            return redirect()->intended('/');
        }
    }
}
