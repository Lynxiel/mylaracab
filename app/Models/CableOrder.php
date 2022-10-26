<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CableOrder extends Model
{
    use HasFactory;

    protected $table = 'cables_order';


    protected $fillable = ['cable_id','order_id', 'price', 'quantity'];


    function cable(){
        return $this->belongsTo(Cable::class, 'cable_id');
    }

    function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }





// this will give the number model a totals attribute, which will be the sum of both total_calls and total_bids

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

}
