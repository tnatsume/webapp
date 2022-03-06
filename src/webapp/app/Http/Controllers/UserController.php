<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Middleware\UserKbn;
use App\User;
use App\Auction;
class UserController extends Controller
{
    public function __construct(){
        $user = app()->make('App\Http\Controllers\SortController');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = app()->make('App\Http\Controllers\SortController');
        $Authuser = Auth::user();
        // if($Authuser->user_kbn == 0){
        //     // 一般ユーザーの場合
        //     $lists = Auction::GetAuctionList();
        //     foreach($lists as $list){
        //         $list->seller_name = User::GetSellerByAuctionToken($list->token);
        //     }
        //     $data = array(
        //         'lists' => $lists,
        //     );
        //     return view('user.index')->with($data);
        // }else if($Authuser->user_kbn == 11){
        //     // 配信者の場合
        //     $lists = Auction::GetAuctionListByUserToken($Authuser->token);
        //     $data = array(
        //         'lists' => $lists,
        //     );
        //     return view('seller.index')->with($data);

        // }else if($Authuser->user_kbn == 99 ){


        //     return view('user.index')->with($data);

        // } else{

        // }


    }
    /**
     * 本人確認書類を提出する
     */
    public function uploadIndex($user_token){
        $data = array(
            'user_token' => $user_token,
        );
        dd($data);
        return view('uploader.index')->with($data);
    }
    /**
     * 本人確認書類を確認する
     */
    public function uploadCOnfirm(\App\Http\Requests\UploaderRequest $req ,$user_token){
        $username = $req->username;
        $thum_name = uniqid("THUM_") . "." . $req->file('thum')->guessExtension(); // TMPファイル名
        $req->file('thum')->move(public_path() . "/img/tmp", $thum_name);
        $thum = "/img/tmp/".$thum_name;

        $hash = array(
        'thum' => $thum,
        'username' => $username,
        'user_token' =>$user_token,
        );

        return view(route('uploadIndex'))->with($hash);
    }

    /**
     * 本人確認書類を提出する
     */
    public function uploadFinish(Request $req, $user_token){
        $uploader = new \App\Uploader;
        $uploader->user_token = $user_token;
        $uploader->username = $req->username;
        $uploader->save();

        // レコードを挿入したときのIDを取得
        $lastInsertedId = $uploader->id;

        // ディレクトリを作成
        if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
        mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
        }

        // 一時保存から本番の格納場所へ移動
        rename(public_path() . $req->thum, public_path() . "/img/" . $lastInsertedId . "/thum." .pathinfo($req->thum, PATHINFO_EXTENSION));

        return view('uploader.finish');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
