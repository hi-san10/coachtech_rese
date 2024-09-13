@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="rese-detail">
    <div class="rese-detail__content">
        <a href="{{ route('shop_all') }}">&lt;</a>
        <span>{{ $restaurants->name }}</span>
        <img src="{{ $restaurants->image }}" alt="">
        <small>#{{ $restaurants->prefecture->name_jp }}</small>
        <small>#{{ $restaurants->genre->name }}</small>
        <p>{{ $restaurants->detail }}</p>
    </div>
    <div class="rese-detail__reservation">
        <form action="{{ route('reservation',['user_id' => Auth::id(), 'shop_id' => $restaurants->id]) }}" method="post">
            @csrf
        <div class="rese-detail__reservation-date">
            <h3>予約</h3>
            <input type="date" name="date">
            <select name="time" id=>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
            </select>
            <select name="number" id="">
                <option value="1">1人</option>
                <option value="2">2人</option>
            </select>
        </div>
        <div class="rese-detail__reservation-confirm">
            <input type="text">
        </div>
        <button>予約する</button>
        </form>
    </div>
</div>
@endsection