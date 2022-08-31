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

class User extends Authenticatable
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserIdByEmail(string $email):?int{
        $result = DB::table('users')
            ->select('*')
            ->where('email' ,'=',$email)
            ->get();
       if (isset($result[0])) return $result[0]->id;
        else return null;
    }

    public function addNewUser(string $email ) :int{
        $password = Str::random(8);
        $this->user_id = DB::table('users')->insertGetId(
            ['email' => $email,
                'password'=> Hash::make($password),
                'created_at'=>date('Y-m-d H:i:s')],
        );

        //Send registration email
        if ( $this->user_id) MailController::accountRegister($email, $password);

        return $this->user_id;
    }

    public function DeleteUser(int $user_id){

        DB::table('users')->where('id', '=', $user_id)->delete();
        session()->flash('success', 'AccountDeleted');
        return redirect()->intended('/');
    }
}
