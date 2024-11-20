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
                <h2 id="shop_name">{{ $restaurants->name }}</h2>
            </div>
            @if(is_null($restaurants->image))
            <img class="shop__img" src="{{ asset($restaurants->storage_image) }}" alt="">
            @else
            <img class="shop__img" src="{{ $restaurants->image }}" alt="">
            @endif
            <div class="inner__pre-genre">
                <small>#{{ $restaurants->prefecture->name_jp }}</small>
                <small>#{{ $restaurants->genre->name }}</small>
            </div>
            <p>{{ $restaurants->detail }}</p>
        </div>

        <div class="rese-detail__reservation">
            <div class="reservation__text">
                <h2>予約</h2>
            </div>
            <form id="reservation" action="{{ route('reservation',['user_id' => Auth::id(), 'shop_id' => $restaurants->id]) }}" method="post">
                @csrf
            <div class="rese-detail__reservation-form">
                <div class="form__inner date">
                    <label for="date">
                    <input id="rese_date" type="date" name="date" min="{{ $current }}" onchange="dateChange()"></label>
                </div>
                <div class="error__message">
                    @error('date')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__inner time">
                    <select name="time" id="rese_time" onchange="timeChange()">
                        <option value="">時間</option>
                        <option value="00:00">00:00</option>
                        <option value="01:00">01:00</option>
                        <option value="02:00">02:00</option>
                        <option value="03:00">03:00</option>
                        <option value="04:00">04:00</option>
                        <option value="05:00">05:00</option>
                        <option value="06:00">06:00</option>
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>
                <div class="error__message">
                    @error('time')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__inner number">
                    <select name="number" id="rese_number" onchange="numberChange()">
                        <option value="">人数</option>
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                        <option value="9">9人</option>
                        <option value="10">10人</option>
                    </select>
                </div>
                <div class="error__message">
                    @error('number')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            </form>
            <div  class="rese-detail__reservation-confirm">
                <table>
                    <tr>
                        <th>Shop</th>
                        <td id="name"></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="date"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="time"></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td id="number"></td>
                    </tr>
                </table>
            </div>
            <div class="form__btn">
                <button form="reservation">予約する</button>
            </div>
        </div>

    </div>

</div>
@endsection