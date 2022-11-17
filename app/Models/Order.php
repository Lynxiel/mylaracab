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


    protected $fillable = ['comment','status', 'user_id', 'address','pay_link'];

    public function user(){
        return $this->BelongsTo(User::class);
    }



    public function cables(){
        return $this->belongsToMany(Cable::class )->withPivot(['quantity', 'price','footage']);
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
