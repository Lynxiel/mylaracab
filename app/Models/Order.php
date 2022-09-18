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
    protected $primaryKey = 'order_id';
    protected ?int $user_id;
    protected string $phone='';
    protected int $status = self::CREATED;
    protected array $cables = [];



    public function setUserID(?int $user_id ) :static{
        $this->user_id = $user_id;
        return $this;
    }

    public function setPhone(string $phone ) :static{
        $this->phone = $phone;
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

    public static function GetOrdersWithContents(int $order_id){
        return DB::table('orders')
            ->select('*')
            ->whereIN('order_id' ,'=',$order_id)
            ->get();
    }

    public static function GetUserOrders(?int $user_id){
        $result =  DB::table('orders')
            ->select('orders.order_id','comment' , 'cables.title as title', 'orders.created_at', 'cables_order.quantity',
                'cables_order.price', 'status', 'orders.address as delivery_address', 'pay_link',
                'email','phone', 'contact_name','users.address as company_address','company_name')
            ->join('cables_order', 'orders.order_id', '=', 'cables_order.order_id')
            ->Leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->join('cables', 'cables.cable_id', '=', 'cables_order.cable_id');
            if ($user_id) $result->where('orders.user_id' ,'=',$user_id);
           $result->orderBy('orders.order_id','desc');

        $result =  $result->get();
        return $result->groupBy(['order_id'], false);

    }

    public function AddOrder(){
        return $this->order_id = DB::table('orders')->insertGetId(
            ['user_id' => $this->user_id,
                'status' => $this->status,
                'comment'=> $this->phone,
                'created_at'=> date('Y-m-d H:i:s')]
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
