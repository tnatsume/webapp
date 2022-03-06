<?php

namespace App\Http\Controllers;
//AuctionController@CreateAuction
use Illuminate\Http\Request;
use App\Auction;
class AuctionController extends Controller
{
    /**
     * オークションの詳細を取得する
     * 
     * @param $token
     * @return array $auction
     */
    public static function GetAuctionDeteil($token){
        return Auction::GetAuctionDetail($token);
    }
    /**
     * オークションを作成する
     * 
     * @param 
     * @return none
     */
    public function CreateAuction(){
        return view('seller.create');
    }
}
