@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お礼') }}</div>

                <p>
                    この度は、ご購入いただきましてありがとうございます。
                </p>
                @if($detail->auction_kbn==0)
                    <p>締切日時に落札金額が一番高い方に、</p>
                @else 
                    <p>抽選の結果、見事当選された方には</p>
                @endif
                <p>電話日時の15分前にビデオ通話ができるURLを送らせていただきます。</p>
            </div>
            <div class="card">
                <a href="/"class="btn btn-primary">戻る</a>

            </div>
        </div>
    </div>
</div>
@endsection
