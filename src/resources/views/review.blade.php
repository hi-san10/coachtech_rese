@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')
<div class="review-container">
    <div class="review-content">
        <form action="/review/store" method="post">
            @csrf
            <div class="review-content__review">
                <h2 class="shop_name">{{ $shop_name }}の評価</h2>
                <p>[評価段階]</p>
                <div class="review_point">
                    <div class="review_item">
                        <input type="radio" value="1" name="review_point" id="1" value="1">
                        <label for="1"> 1:悪い</label>
                    </div>
                    <div class="review_item">
                        <input type="radio" value="2" name="review_point" id="2" value="2">
                        <label for="2"> 2:少し悪い</label>
                    </div>
                    <div class="review_item">
                        <input type="radio" value="3" name="review_point" id="3" value="3">
                        <label for="3"> 3:普通</label>
                    </div>
                    <div class="review_item">
                        <input type="radio" value="4" name="review_point" id="4" value="4">
                        <label for="4"> 4:まあまあ良い</label>
                    </div>
                    <div class="review_item">
                        <input type="radio" value="5" name="review_point" id="5" value="5">
                        <label for="5"> 5:良い</label>
                    </div>
                </div>
            </div>
            <div class="review-content__comment">
                <label for="textarea">[コメント]</label>
                <textarea class="comment__textarea" name="review_comment" cols="30" rows="10" id="textarea"></textarea>
            </div>
            <input type="hidden" name="reservation_id" value="{{ $reservation_id }}">
            <button class="review_btn">送信する</button>
        </form>
    </div>
</div>
@endsection