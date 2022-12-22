<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    CONST STATUS = [
        self::CREATED => 'Создан',
        self::CONFIRMED => 'Подтвержден, ожидает оплаты',
        self::PAID => 'Оплачен',
        self::COMPLETED => 'Завершен',
        self::CANCELED => 'Отменен',
    ];


    protected $fillable = ['comment','status', 'user_id', 'address','pay_link', 'delivery_cost', 'discount'];

    public function user(){
        return $this->BelongsTo(User::class);
    }



    public function cables(){
        return $this->belongsToMany(Cable::class )->withPivot(['quantity', 'price','footage']);
    }


    public function getCableSumAttribute():float{
        $sum=0;
        foreach ($this->cables as $cable){
            $sum += $cable->pivot->price*$cable->pivot->quantity*$cable->pivot->footage;
        }
        return  $sum;
    }


    public function getTotalSumAttribute():float{
        $cableSum = $this->getCableSumAttribute();
        return $cableSum - ($cableSum*($this->discount/100)) + $this->delivery_cost;
    }

    public function getPivotSum(int $key, $discount = 0):float{
        $cable = $this->cables->get($key)->pivot;
        return $cable->quantity*$cable->footage*$cable->price - $cable->quantity*$cable->footage*$cable->price*($discount/100);
    }

    public  function getPivotDiscount($key):float{
        return $this->getPivotSum($key)*($this->discount/100);
    }


    public function deleteOrder(int $order_id){
        // Hard delete
        DB::table('cables_order')->where('order_id', '=', $order_id)->delete();
        self::where('order_id', '=', $order_id)->delete();
    }

    public static function  cancelOrder(int $order_id){

        self::where('order_id', '=', $order_id)->update(['status'=>self::CANCELED]);
    }

    public function getStatusTitle(int $value):string{

       return self::STATUS[$value]??'';
    }




}
