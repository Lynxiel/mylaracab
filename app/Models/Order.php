<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    CONST CREATED = 0;
    CONST CONFIRMED = 1;
    CONST PAID = 2;
    CONST COMPLETED = 3;
    CONST CANCELED = 4;
    protected $primaryKey = 'order_id';

    protected $fillable = ['comment','status', 'user_id'];



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

    public static function GetOrdersWithContents(int $order_id){
        return DB::table('orders')
            ->select('*')
            ->whereIN('order_id' ,'=',$order_id)
            ->get();
    }

    public static function GetUserOrders(?int $user_id=null, ?array $status=[self::CREATED, self::CONFIRMED, self::PAID, self::COMPLETED]){
        $result =  DB::table('orders')
            ->select('orders.order_id','comment' , 'cables.title as title', 'orders.created_at', 'cables_order.quantity',
                'cables_order.price', 'status', 'orders.address as delivery_address', 'pay_link',
                'email','phone', 'contact_name','users.address as company_address','company_name')
            ->join('cables_order', 'orders.order_id', '=', 'cables_order.order_id')
            ->Leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->join('cables', 'cables.cable_id', '=', 'cables_order.cable_id');
            if ($user_id) $result->where('orders.user_id' ,'=',$user_id);
            if ($status!==null) $result->whereIn('orders.status' ,$status);
           $result->orderBy('orders.order_id','desc');

        $result =  $result->get();
        return $result->groupBy(['order_id'], false);

    }

    public static function AddCablesToOrder(Collection $cables, int $order_id){
        foreach ($cables as $cable) {

            if (session()->get('cable_id')[$cable->cable_id]==0) continue;
            DB::table('cables_order')->insert([
                'order_id' => $order_id,
                'price' => $cable->price,
                'quantity' => session()->get('cable_id') ? (session()->get('cable_id')[$cable->cable_id]*$cable->footage) : $cable->footage,
                'cable_id' => $cable->cable_id

            ]);
        }
    }


    public function deleteOrder(int $order_id){
        // Hard delete
        DB::table('cables_order')->where('order_id', '=', $order_id)->delete();
        DB::table('orders')->where('order_id', '=', $order_id)->delete();
    }

    public static function  cancelOrder(int $order_id){

        DB::table('orders')->where('order_id', '=', $order_id)->update(['status'=>self::CANCELED]);
    }

    public  static function isUserOrder(int $order_id, int $user_id):bool{
        $result =  DB::table('orders')
            ->select('*')
            ->where('user_id' ,'=',$user_id)
            ->where('order_id' ,'=',$order_id)
            ->get();
        if (isset($result[0])) return true;
        else return false;
    }


}
