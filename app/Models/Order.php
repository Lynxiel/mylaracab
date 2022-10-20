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

    public function user(){
        return $this->hasOne(User::class, 'id');
    }

    public function cables(){
        return $this->hasMany(CableOrder::class, 'order_id');
    }

    public static function GetUserOrders(?int $user_id=null, ?array $status=[self::CREATED, self::CONFIRMED, self::PAID, self::COMPLETED]){
        $result =self::select('orders.order_id','comment' , 'cables.title as title', 'orders.created_at', 'cables_order.quantity',
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

    public function deleteOrder(int $order_id){
        // Hard delete
        DB::table('cables_order')->where('order_id', '=', $order_id)->delete();
        self::where('order_id', '=', $order_id)->delete();
    }

    public static function  cancelOrder(int $order_id){

        self::where('order_id', '=', $order_id)->update(['status'=>self::CANCELED]);
    }




}
