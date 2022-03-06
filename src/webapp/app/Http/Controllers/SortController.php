<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SortController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * ユーザー区分を返す
     * 
     * @param $user_token
     * @return $user_kbn
     */
    public static function SortUserKbnByUserToken($user_token){
        
        return DB::table('users')
                ->select('user_kbn')
                ->where('token', '=', $user_token)
                ->first();
    }

}
