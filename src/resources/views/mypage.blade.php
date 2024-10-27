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
                            <p>予約{{ $reservation_number++ }} </p>
                        </div>
                        <div>
                            <form action="{{ route('delete', ['reservation_id' => $my_data->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick='return confirm("本当に削除しますか？")'>×</button>
                            </form>
                        </div>
                    </div>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('https://www.example.com')) !!} ">
                    <form action="{{ route('changeform', ['id' => $my_data->restaurant_id, 'name' => $my_data->restaurant->name, 'reservation_id' => $my_data->id]) }}" method="post">
                        @csrf
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
                                <td>{{ substr($my_data->time, 0, 5) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>{{ $my_data->number_of_people }}人
                                </td>
                                <td>
                                    @if(date('Y-m-d') < date('Y-m-d', strtotime($my_data->date . '+1 day')))
                                    <button>変更する</button>
                                    @elseif($my_data->is_review)
                                    <a class="review_btn" href="{{ route('review_confirm', ['reservation_id' => $my_data->id, 'shop_name' => $my_data->restaurant->name]) }}">評価を見る</a>
                                    @else
                                    <a class="review_btn"  href="{{ route('review', ['reservation_id' => $my_data->id, 'shop_name' => $my_data->restaurant->name]) }}">評価する</a>
                                    @endif
                                </td>
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