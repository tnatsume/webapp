@extends('layouts.app')

@section('content')
<!--フォーム-->
<form action="{{route('" method="post" class="needs-validation" novalidate>
{{ csrf_field() }}
{{ method_field('patch') }}
<!--区分-->
<div class="form-group row">
    <label for="inputKbn" class="col-sm-2 col-form-label">区分</label>
    <div class="form-group">
        <div class="radio-inline">
            <input type="radio" name="Auctionkbn" value="0" class="form-control @if($errors->has('kbn')) is-invalid @endif" id="kbn" required checked>
            <label for="huey">オークション</label>
        </div>
        <div class="radio-inline">
            <input type="radio" name="Auctionkbn" value="1" class="form-control @if($errors->has('kbn')) is-invalid @endif" id="kbn" required>
            <label for="huey">抽選券</label>
        </div>
        @if($errors->has('kbn'))
            <div class="invalid-feedback">{{ $errors->first('kbn') }}</div>
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
        <input type="date" name="deadline_date" value="{{ old('deadline_date') }}" class="form-control @if($errors->has('deadline_date')) is-invalid @endif" id="inputNdeadline_dateame"  required>
        @if($errors->has('deadline_date'))
            <div class="invalid-feedback">{{ $errors->first('deadline_date') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
<!--/締切日-->

<!--実施日-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">実施日</label>
    <div class="col-sm-10">
        <input type="date" name="Calling_date" value="{{ old('Calling_date') }}" class="form-control @if($errors->has('Calling_date')) is-invalid @endif" id="inputNdeadline_dateame"  required>
        @if($errors->has('Calling_date'))
            <div class="invalid-feedback">{{ $errors->first('Calling_date') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
<!--/実施日-->

<!--シチュエーション-->
<div class="form-group row" id="situation" style="display:">
    <label for="inputEmail" class="col-sm-2 col-form-label">シチュエーション</label>
    <div class="col-sm-10">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" id="inputEmail" placeholder="yamada@laraweb.net" required>
        @if($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
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
<div class="form-group row" id="return_Gift" style="display:none">>
    <label for="return_Gift" class="col-sm-2 col-form-label">返礼品の有無</label>
    <div class="form-group">
        <div class="radio-inline">
            <input type="radio" name="return_Gift" value="0" class="form-control @if($errors->has('return_Gift')) is-invalid @endif" id="return_Gift" required checked>
            <label for="huey">無</label>
        </div>
        <div class="radio-inline">
            <input type="radio" name="return_Gift" value="1" class="form-control @if($errors->has('return_Gift')) is-invalid @endif" id="return_Gift" required>
            <label for="huey">有</label>
        </div>
        @if($errors->has('return_Gift'))
            <div class="invalid-feedback">{{ $errors->first('return_Gift') }}</div>
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
    $(function(){
    $('input[name="Auctionkbn"]:radio').change( function() {
        var radioval = $("[name=Auctionkbn]:checked").val()
        if(radioval == 0){
                document.getElementById('situation').style.display = "";
                document.getElementById('value').style.display = "none";
                document.getElementById('return_Gift').style.display = "none";
        }else{
                document.getElementById('situation').style.display = "none";
                document.getElementById('value').style.display = "";
                document.getElementById('return_Gift').style.display = "";
        }
    });});
</script>
@endsection('content')