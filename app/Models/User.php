<?php

namespace App\Models;

use App\Http\Controllers\MailController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders(){
        return $this->hasMany(Order::class,'user_id');
    }


    public static function getUserIdByEmail(string $email):?int{
        $result = DB::table('users')
            ->select('*')
            ->where('email' ,'=',$email)
            ->get();
       if (isset($result[0])) return $result[0]->id;
        else return null;
    }






}
