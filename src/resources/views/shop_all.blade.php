@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('link')
@endsection

@section('content')
<div class="rese-shop">
    <div class="rese-shop__content">
        @foreach($restaurant as $restaurant)
        <div class="rese-shop__item">
            <div class="rese-shop__item-img">
                <img src="{{ $restaurant->image }}"></img>
            </div>
            <div class="rese-shop__item-text">
                <h3>{{ $restaurant->name }}</h3>
                <small>#{{ $restaurant->prefecture->name_jp }}</small>
                <small>#{{ $restaurant->genre->name }}</small>
                <a href="{{ route('detail', ['shop_id' => $restaurant->id]) }}">詳しく見る</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection