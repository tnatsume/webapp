@extends('layouts.app')

@section('content')
<div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
    <div class="col-sm-10" style="padding-left:0;">
        <form method="Get" action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" value="" placeholder="検索キーワード">
            </div>
            <div class="form-group">
                <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
            </div>
        </form>
    </div>
    <div class="col-sm-2" style="padding-left: 0;">
        <a href="{{route('CreateAuction')}}" class="btn" style="background-color: #f0ad4e; color: white; width: 100px;"><i class="fas fa-plus"></i> 新規登録</a>
    </div>
</div>
<!--テーブル-->
<div class="table-responsive">
<table class="table" style="width: 1000px; max-width: 0 auto;">
    <tr class="table-info">
        @if ($user->user_kbn == 0)
        <th scope="col" width="20%">出品者の名前</th>
        @endif
        <th scope="col" width="10%">方式</th>
        <th scope="col" width="15%">締切日</th>
        <th scope="col" width="15%">実施日</th>
        <th scope="col" width="40%" colspan="3">シチュエーション</th>
    </tr>
        @foreach($lists as $list)
        <tr>
            @if($user->user_kbn == 0)
            <th scope="col" width="20%">
                {{$list->auction_name}}
            </th>
            @endif
            <th scope="col" width="5%">
                @if($list->auction_kbn == 0){{__('オークション')}}
                @else{{__('抽選券')}}
                @endif
            </th>
            <th scope="col" width="20%">{{$list->Deadline_date}}</th>
            <th scope="col" width="20%">{{$list->Calling_date}}</th>
            <th scope="col" width="40%" colspan="3">
                <a href="/auctions/{{$list->auction_token}}">
                    {{$list->situation}}
                </a>    
            </th>

        </tr>
        @endforeach
    </table>
    </div>
   <!--/テーブル-->

<!-- ページネーション -->
{!! $lists->render() !!}
@endsection
