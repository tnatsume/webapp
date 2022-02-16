<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request; // 追加
use Illuminate\Support\Facades\Hash; // 追加
use DB;

class ChangePassword extends Controller
{
    public function showForm(){
        $user_token = Auth::user()->token;
        $data = array(
            'user_token' => $user_token,
        );

        return view('auth.change_password.form')->with($data);

    }

    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:6|regex:/^(?=.*?[a-zA-Z])(?=.*?\d)[a-zA-Z\d]/', // 正規表現を使って、半角英数字混在',
            'confirm_password' => 'required|same:new_password', // user_passwordと値が同じか
        ]);
        $data = $request->all();
        $user = DB::table('users')
                ->where('token', '=', $data['user_token'])
                ->first();
        
        if(!Hash::check($data['password'], $user->password)){
            
            return view('auth.change_password.form');
        }else{
            try{
                $user->password = $data['new_password'];
                DB::commit();
                $user = DB::table('users')
                    ->where('token', '=', $data['user_token'])
                    ->first();
                    session()->flush('msg_success', 'パスワードの変更に成功しました。');
                    return view('auth.change_password.form')->with($data);
            }catch(Exception $e){
                throw new Exception($e);
                return redirect('/home');
            }
            
        }

    }
    public function messages()
    {
        return [
          'password.required'    => 'パスワードは必須です。', 
          'new_password.required'    => 'パスワードは必須です。',
          'new_password.min'         => 'パスワードは :min桁以上で入力してください。',
          'user_password.regex'       => 'パスワードは半角英数字混在で入力してください。',
          'confirm_password.required' => 'パスワード確認用は必須です。',
          'confirm_password.same'     => 'パスワードとパスワード確認用が一致しません。',
        ];
    }
}
