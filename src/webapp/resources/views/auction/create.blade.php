@extends('layouts.app')

@section('content')
<!--フォーム-->
<form action="{{route('PostAuction')}}" method="post" class="needs-validation" novalidate>
    {{ csrf_field() }}
    <!--タイトル-->
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">
        <input type="text" name="title" value="{{ old('title') }}" class="form-control @if($errors->has('title')) is-invalid @endif" id="inputName" placeholder="" required>
        @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
    <!--/タイトル-->

    <!--実施日-->
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">実施日</label>
        <div class="col-sm-10">
            <input type="datetime-local" name="Calling_date" value="{{ old('Calling_date') }}" class="form-control @if($errors->has('Calling_date')) is-invalid @endif" id="Calling_date"  required>
            @if($errors->has('Calling_date'))
                <div class="invalid-feedback">{{ $errors->first('Calling_date') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/実施日-->


    <!--区分-->
    <div class="form-group row">
        <label for="inputKbn" class="col-sm-2 col-form-label">区分</label>
        <div class="form-group">
            <div class="radio-inline">
                <input type="radio" name="auction_kbn0" value="0" class="form-control " id="auction_kbn1"  disabled>
                <label for="huey">オークション</label>
            </div>
            <div class="radio-inline">
                <input type="radio" name="auction_kbn1" value="1" class="form-control " id="auction_kbn2"disabled >
                <label for="huey">抽選券</label>
            </div>
            @if($errors->has('auction_kbn'))
                <div class="invalid-feedback">{{ $errors->first('auction_kbn') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/区分-->

    <!--締切日-->
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">締切日</label>
        <div class="col-sm-10">
            <input type="datetime-local" name="Deadline_date" value="{{ old('Deadline_date') }}" class="form-control @if($errors->has('Deadline_date')) is-invalid @endif" id="Deadline_date"  required>
            @if($errors->has('Deadline_date'))
                <div class="invalid-feedback">{{ $errors->first('Deadline_date') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/締切日-->

    <!--シチュエーション-->
    <div class="form-group row" id="situation" style="display:">
        <label for="inputEmail" class="col-sm-2 col-form-label">シチュエーション</label>
        <div class="col-sm-10">
            <input type="text" name="situation" value="{{ old('situation') }}" class="form-control @if($errors->has('email')) is-invalid @endif" id="inputEmail" placeholder="yamada@laraweb.net" required>
            @if($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('situation') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/シチュエーション-->

    <!--価格-->
    <div class="form-group row" id="value" style="display:none">>
        <label for="value" class="col-sm-2 col-form-label">価格</label>
        <div class="col-sm-10">
            <input type="value" name="value" value="{{ old('value') }}" class="form-control @if($errors->has('value')) is-invalid @endif" id="value" placeholder="1000" required>
            @if($errors->has('value'))
                <div class="invalid-feedback">{{ $errors->first('value') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/価格-->
    <!--価格-->
    <div class="form-group row" id="return_gift_flg" style="display:none">>
        <label for="return_gift_flg" class="col-sm-2 col-form-label">返礼品の有無</label>
        <div class="form-group">
            <div class="radio-inline">
                <input type="radio" name="return_gift_flg" value="0" class="form-control @if($errors->has('return_Gift')) is-invalid @endif" id="return_Gift" required checked>
                <label for="huey">無</label>
            </div>
            <div class="radio-inline">
                <input type="radio" name="return_gift_flg" value="1" class="form-control @if($errors->has('return_Gift')) is-invalid @endif" id="return_Gift" required>
                <label for="huey">有</label>
            </div>
            @if($errors->has('return_gift_flg'))
                <div class="invalid-feedback">{{ $errors->first('return_gift_flg') }}</div>
            @else
                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
            @endif
        </div>
    </div>
    <!--/価格-->
    <!--メッセージ-->
    <div class="form-group pb-3" style="display:none">>
        <label for="Textarea">メッセージ</label>
        <textarea name="message" class="form-control @if($errors->has('message')) is-invalid @endif" id="Textarea" rows="3" placeholder="その他、質問などありましたら" required>{{ old('message') }}</textarea>
        @if($errors->has('message'))
            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
    <!--/備考欄-->

    <!--ボタンブロック-->
    <div class="form-group row mt-5">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block">確認</button>
        </div>
    </div>
    <!--/ボタンブロック-->

</form>
<!--/フォーム-->
<!-- jQueryをCDNから読み込み -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
<script src="{{asset('js/create.js')}}"defar></script>
<script type="text/javascript">
    $('input[type="datetime-local"]').blur( function() {
        var now = new Date();
        var Year = now.getFullYear();
        var Month = now.getMonth()+1;
        var date = now.getDate();
        var Hour = now.getHours();
        var Min = now.getMinutes();
        var Sec = now.getSeconds();

        if (Month < 10){
            Month = "0" + Month;
        }
        if (date < 10){
            date = "0" + date;
        }
        if (Hour < 10 ){
            Hour = "0" + Hour;
        }
        if (Min < 10 ){
            Min = "0" + Min;
        }

        // 時間差分を抽出し、24時間未満の場合にはオークションにチェックをつけ、24時間以上の場合は、抽選券にチェックをつける
        var target_date = Year + "-" + Month + "-" + date + "T" + Hour + ":" + Min;
        var done_date = document.querySelector('input[type="datetime-local"]').value;
        
        var diff = done_date.getTime() - target_date.getTime();
        var diffDay = Math.floor(diff / (1000 * 60 * 60 * 24));

        if(diffDay < 24){
            $("[name=auction_kbn0]:checked").val();
        }else{
            $("[name=auction_kbn1]:checked").val();
        }
    });
</script>
@endsection('content')