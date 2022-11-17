<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use App\Models\Cable;
use App\Models\CableOrder;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
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
        $cables=[];
        $ids = self::getCartList($request);
        if ($ids)
            $cables =  Cable::whereIN('id', array_keys($ids))->get();
         return $cables;
    }

    public static function prepareForSave($cables, $order_id){

        foreach ( $cables as $key=>$cable)    {
            $cableOrder[] = (new CableOrder())->fill($cable->toArray());
            $cableOrder[$key]['quantity'] =  session()->get('id') ? (session()->get('id')[$cable->id]*$cable->footage) : $cable->footage;
            $cableOrder[$key]['order_id'] =  $order_id;
        }

        return $cableOrder;
}


    /**
     * Add product to cart and store it in session
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function  add(Request $request){

        $cart_list = array();
        $id = (int)$request->input("cable_id");
        if ($id){
            $current_list = $this->getCartList($request);
            if ($current_list) $cart_list = $current_list;
            $cart_list[$id] = 1; //initial quantity
            $request->session()->put('id',$cart_list);

            session()->flash('success', 'Успешно добавлено в корзину!');
            $cart  = self::init($request);
            return view('partials.cart', compact('cart'));
        }

    }

    protected static function  getCartList(Request $request){
        $cart_list = $request->session()->get('id');
        return $cart_list;
    }

    public function update(Request $request){

        $id = (int)$request->input("cable_id");
        $quantity = (int)$request->input("quantity");

        if ($quantity==0) {
            $this->removeFromCart($request);
        }

        $cart_list = $request->session()->get('id');
        $cart_list[$id] = $quantity;

        $request->session()->remove('id');
        $request->session()->put('id',$cart_list);

        $cart  = CartController::init($request);
        return view('partials.cart' , compact('cart'));

    }

    public function remove(Request $request){
        $id = (int)$request->input("cable_id");
        if ($id){
            $cart_list = $this->getCartList($request);
            unset($cart_list[$id]);
            $request->session()->remove('id');
            $request->session()->put('id',$cart_list);

            $cart  = CartController::init($request);
            return view('partials.cart' , compact('cart'));
        }
    }



}
