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

    private $order_id;
    private $user_id;
    private $status = self::CREATED;
    private $cables = array();

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user_id = auth()->user()->id;

    }


    public static function GetOrder(int $order_id){
        return DB::table('orders')
            ->select('*')
            ->where('order_id' ,'=',$order_id)
            ->get();
    }

    public static function GetUserOrders(int $user_id){
        return DB::table('orders')
            ->select('*')
            ->where('user_id' ,'=',$user_id)
            ->get();
    }

    public function AddOrder(){
        return $this->order_id = DB::table('orders')->insertGetId(
            ['user_id' => $this->user_id, 'status' => $this->status]
        );
    }

    public function AddCablesToOrder( $cables){
        foreach ($cables as $cable)
        DB::table('cables_order')->insert([
            'order_id'=> $this->order_id,
            'price' => $cable->price,
            'quantity'=>session()->get('cable_id')?session()->get('cable_id')[$cable->cable_id]:100,
            'cable_id'=>$cable->cable_id

        ]);
    }
}
