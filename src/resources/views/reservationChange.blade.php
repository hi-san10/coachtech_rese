@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservationChange.css') }}">
@endsection

@section('content')
<div class="reservation_change">
    <div class="reservation_change__form">
        <form action="{{ route('update', ['id' => $my_datas->id]) }}" method="post">
            @method('patch')
            @csrf
            <table>
                <tr>
                    <th>
                        <td></td>
                        <td><a href="{{ route('mypage', ['user_id' => Auth::id()]) }}" class="return_btn">戻る</a></td>
                    </th>
                </tr>
                <tr>
                    <th>Shop</th>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input class="change" type="date" name="date" value="{{ $my_datas->date }}" min="{{ $current }}"></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><select class="change" name="time" id="">
                        <option value="{{ $my_datas->time }}">{{ substr($my_datas->time, 0, 5) }}</option>
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
                    </select></td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>
                        <select class="change" name="number" id="number">
                            <option value="{{ $my_datas->number_of_people }}">{{ $my_datas->number_of_people }}人</option>
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
                    </td>
                    <td><button>変更確定</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection