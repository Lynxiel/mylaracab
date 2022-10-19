<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CableOrder extends Model
{
    use HasFactory;

    protected $table = 'cables_order';

    function cables(){
        return $this->hasMany('orders','order_id');
    }

    function orders(){
        return $this->hasMany('cables', 'cable_id');
    }

    function cable(){
        return $this->belongsTo(Cable::class, 'cable_id');
    }

    function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

}
