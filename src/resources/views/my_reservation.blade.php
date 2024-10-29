@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_change.css') }}">
@endsection

@section('content')
<div class="rese-change_reservation">
    <div class="rese-detail__reservation">
        <div class="reservation__text">
            <h2>予約画面</h2>
        </div>
        <div  class="rese-detail__reservation-confirm">
            <table>
                <tr>
                    <th>Shop</th>
                    <td id="name">{{ $my_datas->restaurant->name }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td id="date">{{ $my_datas->date }}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td id="time">{{ substr($my_datas->time, 0, 5) }}</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td id="number">{{ $my_datas->number_of_people }}人</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection