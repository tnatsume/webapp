<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use Auth;
use App\Successful_bid;
use Carbon\Carbon;
class AuctionController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * オークションの詳細を取得する
     * 
     * @param $token
     * @return array $auction
     */
    public static function GetAuctionDeteil($auction_token){
        $detail =  Auction::GetAuctionDetail($auction_token);
        $now = Carbon::now();
        $chk = Auction::CheckForDeadline($now, $detail);
        $user = Auth::user();
        $data = array(
            'detail' => $detail,
            // 'chk' => $chk,
            'chk' => true,
            'user' => $user,
        );

        return view('auction.detail')->with($data);

    }
    /**
     * オークションを作成する
     * 
     * @param 
     * @return none
     */
    public function CreateAuction(){
        return view('auction.create');
    }

    /**
     * オークションを作成する
     * 
     * @pram $request
     * @return 
     */
    public function PostAuction(Request $request){
        $user = Auth::user();
        if($request->auction_kbn == 0){
            $request->validate([
                'title' => 'required',
                'Deadline_date' => 'required',
                'Calling_date' => 'required',
                'situation' => 'string|max:128',
            ]);
        }else{
            $request->validate([
                'title' => 'required',
                'Deadline_date' => 'required',
                'Calling_date' => 'required',
                'situation' => 'string|max:128',
                'value' => 'required',
                'return_gift_flg' => 'required',
            ]);
        }
        Auction::CreateAuction($user, $request);
        
        return redirect('home');
    }

    /**
     * オークションを落札する。/　抽選券を買う - 開始画面
     * 
     * @pram $auction_token, $user_token
     * 
     */
    public function bidIndex($auction_token){
        $detail =  Auction::GetAuctionDetail($auction_token);
        $user = Auth::user();
        $data = array(
            'detail' => $detail,
            'user' => $user,
        );
        return view('bid.index')->with($data);
    }
    /**
     * オークションを落札する。/　抽選券を買う - 取引画面
     * 
     * @pram $auction_token, $user_token
     * 
     */
    public function BidPost(Request $request ,$auction_token){
        $detail =  Auction::GetAuctionDetail($auction_token);
        $user = Auth::user();
        Successful_bid::PostBidInfo($detail, $user, $request);

        $data = array(
            'detail' => $detail,
        );
        return view('bid.post')->with($data);
    }

}