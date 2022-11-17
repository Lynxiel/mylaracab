<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CableOrder extends Model
{
    use HasFactory;

    protected $table = 'cable_order';


    protected $fillable = ['cable_id','order_id', 'price', 'quantity'];


    function cable(){
        return $this->belongsTo(Cable::class, 'cable_id');
    }

    function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }



}
