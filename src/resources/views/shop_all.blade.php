@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css.shop_all.css') }}">
@endsection

@section('link')
@endsection

@section('content')
<div class="rese">
    <div class="rese-shop">
        @foreach($restaurant as $restaurant)
        <div class="rese-shop__item">
            <img src="{{ $restaurant->image }}"></img>
        </div>
        @endforeach
    </div>
</div>
@endsection