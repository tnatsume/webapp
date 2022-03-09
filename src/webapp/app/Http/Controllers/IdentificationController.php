<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identification;
use App\User;
class IdentificationController extends Controller
{
    
    /**
     * 本人確認書類を提出する
     */
    public function uploadIndex($user_token){
        $data = array(
            'user_token' => $user_token,
        );
        return view('upload.index')->with($data);
    }
    /**
     * 本人確認書類を提出する
     */
    public function uploadFinish(Request $req, $user_token){


        $req->validate([
            'username1' => 'required|image',
            'username2' => 'image',
        ]);
        
        $fileName1 = uniqid("THUM_") . $req->file('username1')->getClientOriginalName();
        $fileName2 = uniqid("THUM_") . $req->file('username2')->getClientOriginalName();
        $target_path = public_path('img/tmp/');
        $req->file('username1')->move($target_path, $fileName1);
        if($req->file('username2')){
            $req->file('username2')->move($target_path, $fileName2);
        } else {
            $fileName2 = "";
        }
        // 画像の保存
        $uploader = new \App\Identification;
        $uploader->user_token = $user_token;
        $uploader->filepath1 = $fileName1;
        $uploader->filepath2 = $fileName2;
        $uploader->user_token = $user_token;
        $uploader->save();

        // 本人確認フラグの更新
        $user = User::GetUserByToken($user_token);
        $user->identification_flag = true;
        $user->save();

        $data = array(
            'user_token' => $user_token,
        );
        return view(route('uploadPost'))->with($data);
    }
    
}
