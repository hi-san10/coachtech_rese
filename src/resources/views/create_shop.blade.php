@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_shop.css') }}">
@endsection

@section('content')
<div class="rese-create_shop">
    <div class="create_shop__content">
        <form action="/restaurant_owner/shop_create" method="post" enctype="multipart/form-data">
            @csrf
            <label for="shop_name">店舗名</label>
            <input type="text" id="shop_name" name="shop_name">
            <label for="name_of_reading_kana">店舗名読み方</label>
            <input type="text" id="name_of_reading_kana" name="name_of_reading_kana">
            <select name="prefecture" id="">
                <option value="">都道府県選択</option>
                @foreach($prefectures as $prefecture)
                <option value="{{ $prefecture->id }}">{{ $prefecture->name_jp }}</option>
                @endforeach
            </select>
            <select name="genre" id="">
                <option value="">ジャンル選択</option>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            <label for="shop_image">店舗画像</label>
            <input type="file" id="shop_image" name="shop_image" accept="image/*">
            <label for="detail">店舗概要</label>
            <textarea name="detail" id="detail"></textarea>
            <button>作成</button>
        </form>
    </div>
</div>
@endsection