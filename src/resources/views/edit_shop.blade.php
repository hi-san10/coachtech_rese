@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_shop.css') }}">
@endsection

@section('content')
<div class="rese-edit_shop">
    <div class="edit-shop__content">
        <form class="edit-shop__form" action="/restaurant_owner/shop_update" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="content__inner">
                <label for="shop_name">店舗名</label>
                <input type="text" id="shop_name" name="shop_name" value="{{ $restaurant->name }}">
            </div>
            <div class="content__inner">
                <label for="name_of_reading_kana">店舗名読み方</label>
                <input type="text" id="name_of_reading_kana" name="name_of_reading_kana" value="{{ $restaurant->name_of_reading_kana }}">
            </div>
            <div class="content__inner">
                <input type="text" value="{{ $restaurant->prefecture->name_jp }}" readonly>
            </div>
            <div class="content__inner">
                <input type="text" value="{{ $restaurant->genre->name }}" readonly>
            </div>
            <div class="content__inner">
                <label for="shop_image">店舗画像</label>
                <input type="file" id="shop_image" name="shop_image" accept="image/*">
            </div>
            <div class="content__inner detail">
                <label for="detail">店舗概要</label>
                <textarea name="detail" id="detail" cols="50" rows="10">{{ $restaurant->detail }}</textarea>
            </div>
            <button class="form_btn">更新</button>
        </form>
    </div>
</div>
@endsection