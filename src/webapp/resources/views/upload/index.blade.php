@extends('layouts.app')

@section('content')
    <div class="card-body">
        <form action="{{route('uploadPost', $user_token)}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group row">
                <label for="1maime">1枚目(表面)</label>
            <input type="file" name="username1">
            </div>
            <div class="form-group row">
                <label for="1maime">2枚目(裏面)</label>
            <input type="file" name="username2">
            </div>
            <div class="form-group row">
            <input type="submit" value="アップロード">
            </div>
        </form>
    </div>
@endsection
