@extends('layouts.app')

@section('content')
<h3>オークション一覧</h3>
<!--テーブル-->
<div class="table-responsive">
<table class="table" style="width: 1000px; max-width: 0 auto;">
    <tr class="table-info">
        <!-- <th scope="col" width="10%">#</th> -->
        <th scope="col" width="20%">出品者の名前</th>
        <th scope="col" width="10%">方式</th>
        <th scope="col" width="15%">締切日</th>
        <th scope="col" width="15%">実施日</th>
        <th scope="col" width="40%" colspan="3">シチュエーション</th>
    </tr>
        @foreach($lists as $list)
        <tr>
            <th scope="col" width="20%">
                {{$list->seller_name}}
            </th>
            <th scope="col" width="5%">
                @if($list->auction_of_call == 0){{__('オークション')}}
                @else{{__('抽選券')}}
                @endif
            </th>
            <th scope="col" width="20%">{{$list->Deadline_date}}</th>
            <th scope="col" width="20%">{{$list->Calling_date}}</th>
            <th scope="col" width="40%" colspan="3">
                <a href="/auction/{token}">
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
