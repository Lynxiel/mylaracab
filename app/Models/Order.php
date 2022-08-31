<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    CONST CREATED = 0;
    CONST CONFIRMED = 1;
    CONST PAID = 2;
    CONST COMPLETED = 3;

    protected $order_id;
    protected $user_id;
    protected $status = self::CREATED;
    protected $cables = array();


    public function setUserID(int $user_id ) :static{
        $this->user_id = $user_id;
        return $this;
    }


    public static function GetOrder(int $order_id){
        return DB::table('orders')
            ->select('*')
            ->where('order_id' ,'=',$order_id)
            ->get();
    }

    public static function getOrderContents(int $order_id){
        return $result =  DB::table('cables_order')
            ->select('*')
            ->join('cables', 'cables.cable_id', '=', 'cables_order.cable_id')
            ->where('cables_order.order_id' ,'=',$order_id)
            ->get();

    }

    public static function GetUserOrders(int $user_id){
        $result =  DB::table('orders')
            ->select('orders.order_id', 'cables.title as title', 'orders.created_at', 'cables_order.quantity', 'cables_order.price', 'status')
            ->join('cables_order', 'orders.order_id', '=', 'cables_order.order_id')
            ->join('cables', 'cables.cable_id', '=', 'cables_order.cable_id')
            ->where('orders.user_id' ,'=',$user_id)
            ->orderBy('orders.order_id','desc')
            ->get();

        //dd($result);
        return $result;

    }

    public function AddOrder(){
        return $this->order_id = DB::table('orders')->insertGetId(
            ['user_id' => $this->user_id, 'status' => $this->status, 'created_at'=> date('Y-m-d H:i:s')]
        );
    }

    public function AddCablesToOrder( $cables){
        foreach ($cables as $cable) {
            if (session()->get('cable_id')[$cable->cable_id]==0) continue;
            DB::table('cables_order')->insert([
                'order_id' => $this->order_id,
                'price' => $cable->price,
                'quantity' => session()->get('cable_id') ? session()->get('cable_id')[$cable->cable_id] : 100,
                'cable_id' => $cable->cable_id

            ]);
        }
    }

    public function cancelOrder(int $order_id){

        DB::table('cables_order')->where('order_id', '=', $order_id)->delete();
        DB::table('orders')->where('order_id', '=', $order_id)->delete();

    }


}
