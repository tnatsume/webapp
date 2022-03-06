<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Auction extends Model
{
    /**
     * tokenから配信者が過去作成したオークションを取得する
     * 
     * @param $token
     * @return $auction
     */
    public static function GetAuctionListByUserToken($token){
        $auction = DB::table('auctions')
                ->where('user_token', '=', $token)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auction;
    }

    /**
     * 過去に登録されたオークションを全て取得する
     * 
     * @param none
     * @return $auction
     */
    public static function GetAuctionList(){
        $auction = DB::table('auctions')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auction;
    }

    /**
     * 
     * 
     */
    public static function GetAuctionDetail($token){
        $auction = DB::table('auctions')
                ->where('token', '=', $token)
                ->first();
    }
    

}
