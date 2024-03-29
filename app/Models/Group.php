<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'cert'];

    public function cables(){
        return $this->hasMany(Cable::class);
    }

}
