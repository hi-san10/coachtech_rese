@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="rese-mypage">
    <div class="rese-mypage__content">
        <h2 class="user-name">{{ \Auth::user()->name }}さん</h2>
            <h2 class="mypage__text">予約状況</h2>
            <h2 class="mypage__text">お気に入り店舗</h2>
        <div class="rese-mypage__content-confirm">
            <div class="confirm__inner">
                @foreach($my_datas as $my_data)
                <div class="confirm__item">
                    <div class="confirm__item-header">
                        <div class="item-header__icon">
                            <span>🕙</span>
                            <p>予約{{ $number++ }} </p>
                        </div>
                        <div>
                            <form action="{{ route('delete', ['reserv_id' => $my_data->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button>×</button>
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('update', ['id' => $my_data->restaurant_id]) }}" method="post">
                        @method('patch')
                        @csrf
                        <table>
                            <tr>
                                <th>Shop</th>
                                <td>{{ $my_data->restaurant->name }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><input class="change" type="date" name="date" value="{{ $my_data->date }}" min="{{ $current }}"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td><select class="change" name="time" id="">
                                    <option value="{{ $my_data->time }}">{{ substr($my_data->time, 0, 5) }}</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00
                                    ">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>
                                    <select class="change" name="number" id="number">
                                        <option value="{{ $my_data->number_of_people }}">{{ $my_data->number_of_people }}人</option>
                                        <option value="1">1人</option>
                                        <option value="2">2人</option>
                                        <option value="3">3人</option>
                                        <option value="4">4人</option>
                                        <option value="5">5人</option>
                                        <option value="6">6人</option>
                                    </select>
                                </td>
                                <td><button>変更する</button></td>
                            </tr>
                        </table>

                    </form>
                </div>
                @endforeach
            </div>

            <div class="my-favorite-shop">
                @foreach($restaurants as $restaurant)
                @if($restaurant->is_favorite)
                <div class="rese-shop__item">
                    <div class="rese-shop__item-img">
                        <img src="{{ $restaurant->image }}"></img>
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
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection