@extends('layouts/app')

@section('css')
@endsection

@section('content')
<form id="form" action="{{ route('password_change', ['id' => $restaurant_owner->id]) }}" method="post">
            @method('patch')
            @csrf
            <div>
                <input type="password" name="new_password" placeholder="新しいパスワード">
                <input type="password" name="confirm_password" placeholder="新しいパスワード(確認)">
            </div>
            <div class="form__btn">
                <button>変更</button>
            </div>
        </form>
@endsection