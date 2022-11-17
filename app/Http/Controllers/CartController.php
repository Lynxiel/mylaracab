<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use App\Models\Cable;
use App\Models\CableOrder;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function init(){
        $cart = self::get();
        return view('partials.cart', compact('cart'));
    }


    public static function get():Collection {
        $items = session()->get('cart');
        return Cable::whereIN('id', $items?array_keys($items):[] )->get();
    }


    public function  add(Request $request){

       $id = (int)$request->input("cable_id");
        if ($id){
            session()->put('cart.'.$id,[
                'cable_id'=>$id,
                'price'=>(float)$request->input("price"),
                'quantity'=>1, //initial
            ]);
        }
        return $this->init();
    }


    public function update(Request $request){

        $id = (int)$request->input("cable_id");
        if ($id){
            $request->session()->put('cart.'.$id,[
                'cable_id'=>$id,
                'price'=>(float)$request->input("price"),
                'quantity'=>(int)$request->input("quantity")] );
        }

        return $this->init();
    }

    public function remove(Request $request){
        $id = (int)$request->input("cable_id");
        if ($id){
            $request->session()->remove('cart.'.$id);
            return $this->init();
        }
    }



}
