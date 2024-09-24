@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="rese-detail">
    <div class="rese-detail__content">
        <div class="rese-detail__content-inner">
            <div class="inner__shop-name">
                <a href="{{ route('shop_all') }}">&lt;</a>
                <span>{{ $restaurants->name }}</span>
            </div>
            <img src="{{ $restaurants->image }}" alt="">
            <div class="inner__pre-genre">
                <small>#{{ $restaurants->prefecture->name_jp }}</small>
                <small>#{{ $restaurants->genre->name }}</small>
            </div>
            <p>{{ $restaurants->detail }}</p>
        </div>

        <div class="rese-detail__reservation">
            <h3>予約</h3>
            <form id="reservation" action="{{ route('reservation',['user_id' => Auth::id(), 'shop_id' => $restaurants->id]) }}" method="post">
                @csrf
            <div class="rese-detail__reservation-date">
                <input type="date" name="date">
                    <div class="error_message">
                        @error('date')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                <select name="time" id=>
                    <option value="">時間<option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                </select>
                    <div class="error_message">
                        @error('time')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                <select name="number" id="">
                    <option value="">人数</option>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                </select>
                    <div class="error_message">
                        @error('number')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            </form>
            <div  class="rese-detail__reservation-confirm">
                <input type="text">
            </div>
            <button form="reservation">予約する</button>
        </div>

    </div>

</div>
@endsection