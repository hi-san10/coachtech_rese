@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('link')
<div class="header__inner-search">
    <form action="/search" method="get">
        <select class="search__title" name="prefecture_id" id="">

            <option value="">All area　▽                    <i class="fa-solid fa-caret-up fa-rotate-180 fa-sm" style="color: #cacfd8;"></i>
</option>
            <option value="13">東京都</option>
            <option value="27">大阪府</option>
            <option value="40">福岡県</option>
        </select>
        <select class="search__title" name="genre_id" id="">
            <option value="">All genre　▽</option>
            <option value="1">寿司</option>
            <option value="2">焼肉</option>
            <option value="3">居酒屋</option>
            <option value="4">イタリアン</option>
            <option value="5">ラーメン</option>
        </select>
        <input type="search" name="name" placeholder="🔍　Search...">
    </form>
</div>
@endsection

@section('content')
<div class="rese-shop">
    <div class="rese-shop__content">
        @foreach($restaurants as $restaurant)
        <div class="rese-shop__item">
            <div class="rese-shop__item-img">
                <!-- @if(config('app.env') == 'local')
                    @if(is_null($restaurant->image))
                    <img class="storage_image" src="{{ asset($restaurant->storage_image) }}" alt="">
                    @else
                    <img class="image" src="{{ $restaurant->image }}" alt="" >
                    @endif
                @else -->
                    @if(is_null($restaurant->image))
                    <img class="storage_image" src="{{ Storage::disk('s3')->url($restaurant->storage_image) }}" alt="">
                    @else
                    <img class="image" src="{{ $restaurant->image }}" alt="" >
                    @endif
                <!-- @endif -->

                <!-- @if(is_null($restaurant->image))
                <img class="storage_image" src="{{ asset($restaurant->storage_image) }}" alt="">
                @elseif(config('app.env') == 'local')
                <img class="image" src="{{ $restaurant->image }}"></img>
                @else
                <img class="storage_image" src="{{ Storage::disk('s3')->url($restaurant->storage_image) }}" alt="">
                @endif -->
            </div>
            <div class="rese-shop__item-text">
                <h3 class="shop__item-text">{{ $restaurant->name }}</h3>
                <small class="shop__item-text">#{{ $restaurant->prefecture->name_jp }}</small>
                <small class="shop__item-text">#{{ $restaurant->genre->name }}</small><br>
                <div class="rese-shop__item-detail">
                    <div class="rese-shop__link">
                        <a href="{{ route('detail', ['shop_id' => $restaurant->id]) }}"><span>詳しく見る</span></a>
                    </div>
                    @if(Auth::check())
                        <form action="{{ route('favorite', ['user_id' => Auth::id(), 'shop_id' => $restaurant->id]) }}" method="post">
                        @csrf
                        @if($restaurant->is_favorite)
                        <button class="fa-solid fa-heart" style="color: #ec0914;"></button>
                        @else
                        <button class="fa-solid fa-heart" style="color: #c1c7d1;"></button>
                        @endif
                    @else
                    @endif
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection