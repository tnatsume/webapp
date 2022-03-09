@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('落札') }}</div>

                <div class="card-body">
                    <form method="POST" action="/auctions/{{$detail->auction_token}}/bidPost">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('落札金額') }}</label>
                            @if($detail->auction_kbn == 1)
                            <label>{{$detail->value}}</label>
                            @else
                                <input type="text"name="value"placeholder="落札金額を入力してください">
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('落札') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
