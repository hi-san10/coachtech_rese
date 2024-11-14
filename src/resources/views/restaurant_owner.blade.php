@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/restaurant_owner.css') }}">
@endsection

@section('content')
<div class="rese-restaurant_owner">
    <div class="restaurant_owner__content">
        <div class="create_restaurant">
            <a href="">店舗作成</a>
        </div>
        <div class="update_restaurant">
            <a href="">店舗情報編集</a>
        </div>
        <div class="reservation_confirm">
            <a href="">予約情報確認</a>
        </div>
        <div class="owner_setting">パスワード変更</div>
    </div>
</div>
@endsection