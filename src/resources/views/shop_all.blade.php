@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('link')
@endsection

@section('content')
<div class="header__inner-search">
    <form action="/search" method="get">
        <select name="prefecture_id" id="">
            <option value="">All area</option>
            <option value="13">東京都</option>
            <option value="27">大阪府</option>
            <option value="40">福岡県</option>
        </select>
        <select name="genre_id" id="">
            <option value="">All genre</option>
            <option value="1">寿司</option>
            <option value="2">焼肉</option>
            <option value="3">居酒屋</option>
            <option value="4">イタリアン</option>
            <option value="5">ラーメン</option>
        </select>
        <input type="search" name="name" placeholder="Search...">
        <button>検索</button>
    </form>
</div>
<div class="rese-shop">
    <div class="rese-shop__content">
        @foreach($restaurants as $restaurant)
        <div class="rese-shop__item">
            <div class="rese-shop__item-img">
                <img src="{{ $restaurant->image }}"></img>
            </div>
            <div class="rese-shop__item-text">
                <h3>{{ $restaurant->name }}</h3>
                <small>#{{ $restaurant->prefecture->name_jp }}</small>
                <small>#{{ $restaurant->genre->name }}</small>
                <a href="{{ route('detail', ['shop_id' => $restaurant->id]) }}">詳しく見る</a>
                @if(Auth::check())
                    <form action="{{ route('favorite', ['user_id' => Auth::id(), 'shop_id' => $restaurant->id]) }}" method="post">
                    @csrf
                    @if($restaurant->is_favorite)
                    <button class="fa-solid fa-heart" style="color: #ec0914;"></button>
                    @else
                    <button class="fa-solid fa-heart" style="color: #c1c7d1;"></button>
                    @endif
                @else
                    <button disabled class="fa-solid fa-heart" style="color: #c1c7d1;"></button>
                @endif
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection