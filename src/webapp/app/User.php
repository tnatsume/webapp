<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;
use Auth;
use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token',
        'email_verified', 'email_verify_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * パスワードリセット通知の送信をオーバーライド
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new PasswordResetNotification($token));
    }

    /**
     * ログインしているユーザーのトークンを返す
     * 
     * @param
     * @return $user_token;
     */
    public function GetUserToken(){
        return Auth::user()->token;

    }
    /**
     * トークンに一致するユーザーを返す
     * 
     * @param $user_token
     * @return array $user
     */
    public function GetUserByToken($user_token){
        return User::findBy($user_token);
    }

    /**
     * ユーザーのパスワードを変更する 
     * 
     * @param $new_password, array $user
     * @return
     */
    public function UpdatePasswordBytoken($new_password, $user){
        $user = $this->GetUserByToken($user->user_token);
        $user->update(['password', $new_password]);

    }

    /**
     * ユーザーを新規に作成する
     * 
     * @param array $data
     * @return array $user
     */
    public function CretateUserByData($data)[
        $user = User::create([
            'email' => $data['email'],
            'token' => Str::random(64),
            'password' => Hash::make($data['password']),
            'email_verify_token' => base64_encode($data['email']),
        ]);
        return $user;
    ]
}
