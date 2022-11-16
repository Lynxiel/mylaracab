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


    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function orders(){
        return $this->hasMany(Cable::class);
    }



    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    use HasFactory;


}
