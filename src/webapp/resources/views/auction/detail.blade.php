@extends('layouts.app')

@section('content')
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">タイトル</label>
    <label for="auction_name">{{$detail->title}}</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">種別</label>
    <label for="auction_name">@if($detail->auction_kbn==0)オークション@else 抽選券 @endif</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">お名前</label>
    <label for="auction_name">{{$detail->auction_name}}</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">シチュエーション</label>
    <label for="auction_name">{{$detail->situation}}</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">落札締切日</label>
    <label for="auction_name">{{$detail->Deadline_date}}</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">電話日時</label>
    <label for="auction_name">{{$detail->Calling_date}}</label>
</div>
<!--/お名前-->
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">値段</label>
    <label for="auction_name">{{$detail->value}}円</label>
</div>
<!--/お名前-->

@if($detail->auction_kbn == 1)
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">返礼品の有無</label>
    <label for="auction_name">@if($detail->return_gift_flg == 0)あり@elseなし@endif</label>
</div>
<!--/お名前-->
@endif
@if($user->user_kbn==0)
<!--ボタンブロック-->
<div class="form-group row mt-5">
    <div class="col-sm-6">
        @if($chk == true)
            @if($user->identification_flag == true)
                <a href="/auctions/{{$detail->auction_token}}/bidIndex" class="btn btn-primary btn-block">落札</a>
            @else
                <p>本人確認書類提出がまだなので、落札はできません。</p>
                <a href="/user/{{$user->user_token}}/upload"class="btn btn-primary">本人各院書類提出はこちら</a>
            @endif
        @else
        <button >落札</button>

        @endif
    </div>
</div>
@endif
@endsection
