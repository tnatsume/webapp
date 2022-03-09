<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Successful_bid extends Model
{
    /**
     * 
     * 
     * 
     */
    public static function PostBidInfo($detail, $user, $req){
        $info = new Successful_bid;
        $info->user_token = $user->user_token;
        $info->auction_token = $detail->auction_token;
        if($detail->auction_kbn == 0){
            $info->value = $req->value;
        }else{
            $info->value = $detail->value;
        }
        

        $info->save();

    }
}
