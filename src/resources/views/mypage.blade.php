@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="rese-mypage">
    <div class="rese-mypage__content">
        <h3>{{ \Auth::user()->name }}さん</h3>
        <div class="rese-mypage__content-confirm">
            <p>予約状況</p>
            @foreach($my_datas as $my_data)
            <div class="rese-mypage__content-confirm--item">
                <p>予約{{ $number++ }} </p>
                <form action="{{ route('delete', ['reserv_id' => $my_data->id]) }}" method="post">
                @method('delete')
                @csrf
                <button>×</button>
                </form>
                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{ $my_data->restaurant->name }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $my_data->date }}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{ $my_data->time }}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{ $my_data->number_of_people }}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        <h3>お気に入り店舗</h3>
        @foreach($restaurants as $restaurant)
        @if($restaurant->favorite)
        <div class="rese-shop__item">
            <div class="rese-shop__item-img">
                <img src="{{ $restaurant->image }}"></img>
            </div>
            <div class="rese-shop__item-text">
                <h3>{{ $restaurant->name }}</h3>
                <small>#{{ $restaurant->prefecture->name_jp }}</small>
                <small>#{{ $restaurant->genre->name }}</small>
                    <button class="fa-solid fa-heart" style="color: #ec0914;"></button>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection