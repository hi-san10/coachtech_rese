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
    </div>
</div>
@endsection