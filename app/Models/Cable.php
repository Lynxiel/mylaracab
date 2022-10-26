<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cable extends Model
{
    protected $fillable = [
        'title', 'cable_group_id', 'instock', 'price', 'footage'
    ];

    protected $primaryKey = 'cable_id';

    public function group(){
        return $this->belongsTo(CableGroup::class,'cable_group_id');
    }

    public function orders(){
        return $this->hasMany(CableOrder::class,'order_id');
    }



    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    use HasFactory;


}
