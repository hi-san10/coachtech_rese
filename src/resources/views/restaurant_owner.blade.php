@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/restaurant_owner.css') }}">
@endsection

@section('content')
<div class="rese-restaurant_owner">
    <div class="restaurant_owner__content">
        <div class="create_restaurant">
            <a class="link" href="/restaurant_owner/create_shop">店舗作成</a>
        </div>
        <div class="create_restaurant-message">
            <p>{{ session('message') }}</p>
        </div>
        <div class="update_restaurant">
            <a class="link" href="/restaurant_owner/edit_shop_top">店舗情報編集</a>
        </div>
        <div class="reservation_confirm">
            <a class="link" href="restaurant_owner/reservation_confirm">予約情報確認</a>
        </div>
        <div class="owner_setting">
            <a class="link" href="restaurant_owner/passwordChange_mail">パスワード変更</a>
        </div>
    </div>
</div>
@endsection