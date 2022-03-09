<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Middleware\UserKbn;
use App\User;
use App\Auction;
use App\Identification;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $user = Auth::user();
        if($user->user_kbn == 0){
            if(!empty($rq->keyword)){
                $lists = Auction::GetAuctionListByKeyword($rq->keyword);
            }else{
                $lists = Auction::GetAuctionList();
            }
            $data = array('user' => $user, 'lists' => $lists);
            
            return view('user.index')->with($data);
        }else if($user->user_kbn == 50){
            if(!empty($rq->keyword)){
                $lists = Auction::GetAuctionListByUserTokenAndKeyword($user->user_token, $rq->keyword);
            }else{
                $lists = Auction::GetAuctionListByUserToken($user->user_token);
            }
            $data = array('user' => $user, 'lists' => $lists);
            
            return view('auction.index')->with($data);
        } else if($user->user_kbn == 99){
            $lists = Auction::GetIdentifiCationCardList();
            $data = array('user' => $user, 'lists' => $lists);
            
            return view('admin.index')->with($data);
        }else{
            abort(404);
        }
        
    }
}
