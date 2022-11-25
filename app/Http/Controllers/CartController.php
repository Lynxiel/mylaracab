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


    public static function get() {
        $items = session()->get('cart');
        if ($items)
            $items = Cable::whereIN('id', $items?array_keys($items):[] )->get();
        return $items;
    }


    public function  update(Request $request){

       $id = (int)$request->input("cable_id");
       $quantity = (int)$request->input("quantity");


       $cable = Cable::findOrFail($id);
       if ($id){
            session()->put('cart.'.$id,[
                'cable_id'=>$id,
                'price'=>$cable->price,
                'quantity'=>$quantity?:1,
                'footage'=>$cable->footage
            ]);

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
