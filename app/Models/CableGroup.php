<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CableGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'cable_group_id';
    protected $fillable = ['title', 'description', 'image'];

    public function cables(){
        return $this->hasMany(Cable::class, 'cable_group_id');
    }

}
