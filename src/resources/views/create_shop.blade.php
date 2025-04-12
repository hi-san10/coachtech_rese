@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_shop.css') }}">
@endsection

@section('content')
<div class="rese-create_shop">
    <div class="create-shop__content">
        <form class="create-shop__form" action="/restaurant_owner/shop_create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content__inner">
                <label for="shop_name">店舗名</label>
                <input type="text" id="shop_name" name="shop_name">
            </div>
            <div class="content__inner">
                <label for="name_of_reading_kana">店舗名読み方</label>
                <input type="text" id="name_of_reading_kana" name="name_of_reading_kana">
            </div>
            <div class="content__inner">
                <select class="select" name="prefecture" id="">
                    <option class="option" value="">都道府県選択</option>
                    @foreach($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->name_jp }}</option>
                    @endforeach
                </select>
            </div>
            <div class="content__inner">
                <select class="select" name="genre" id="">
                    <option value="">ジャンル選択</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="content__inner">
                <label for="shop_image">店舗画像</label>
                <input class="form__inner image" type="file" id="shop_image" name="shop_image" accept="image/*">
            </div>
            <div class="content__inner detail">
                <label for="detail">店舗概要</label>
                <textarea class="form__inner" name="detail" id="detail" cols="50" rows="10"></textarea>
            </div>
            <button class="form_btn">作成</button>
        </form>
    </div>
</div>
@endsection