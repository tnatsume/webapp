<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Str;

class Auction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auction_kbn', 'title',
        'Deadline_date', 'Calling_date',
        'situation', 'value', 'return_gift_flg',
    ];

    /**
     * tokenから配信者が過去作成したオークションを取得する
     * 
     * @param $user_token
     * @return array $auction
     */
    public static function GetAuctionListByUserToken($token){
        $auctions = DB::table('auctions')
                ->where('user_token', '=', $token)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auctions;
    }

    /**
     * tokenから配信者が過去作成したオークションを取得する
     * 
     * @param $user_token
     * @return array $auction
     */
    public static function GetAuctionListByUserTokenAndKeyword($token, $keyword){
        $auctions = DB::table('auctions')
                ->where('keyword', 'like' , '%'. $keyword . '%')
                ->where('user_token', '=', $token)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auctions;
    }


    /**
     * 過去に登録されたオークションを全て取得する
     * 
     * @param none
     * @return array $auction
     */
    public static function GetAuctionList(){
        $auctions = DB::table('auctions')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auctions;
    }
    /**
     * 過去に登録されたオークションを全て取得する
     * 
     * @param $keyword
     * @return array $auction
     */
    public static function GetAuctionListByKeyword($keyword){
        $auctions = DB::table('auctions')
                ->where('keyword', 'like' , '%'. $keyword . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return $auctions;
    }


    /**
     * オークションの詳細を取得する
     * 
     * @param $auction_token
     * @return $auction
     */
    public static function GetAuctionDetail($auction_token){
        $auction = DB::table('auctions')
                ->where('auction_token', '=', $auction_token)
                ->first();

        return $auction;
    }
    /**
     * 
     * 
     * 
     */
    public static function CreateAuction($user, $data){
        $auction = new Auction();
        $auction->title = $data->title;
        $auction->auction_name = $user->name;
        $auction->auction_token = Str::random(64);
        $auction->auction_kbn = $data->auction_kbn;
        $auction->Deadline_date = $data->Deadline_date;
        $auction->Calling_date = $data->Calling_date;

        $auction->situation = $data->situation;
        $auction->value = $data->value;
        $auction->return_gift_flg = $data->return_gift_flg;
        $auction->user_token = $user->user_token;
        $auction->keyword = $data->title. $data->auction_kbn. $data->Deadline_date . $auction->Calling_date.
                            $data->situation . $data->calue;
        $auction->save();
    }
    public static function CheckForDeadline($now, $detail){
        $flg = false;
        if($detail->Deadline_date > $now){
            $flg = true;
        }
        return $flg;
    }
    

}
