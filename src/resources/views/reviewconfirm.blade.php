@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')
<div class="review-container">
    <div class="review-content">
        <form action="/review" method="post">
            @csrf
            <div class="review-content__review">
                <h2 class="shop_name">{{ $shop_name }}の評価</h2>
                <p>[評価段階]</p>
                <div class="review_point">
                    @if($review->review_point == 1)
                    <p>1:悪い</p>
                    @elseif($review->review_point == 2)
                    <p>2:少し悪い</p>
                    @elseif($review->review_point == 3)
                    <p>3:普通</p>
                    @elseif($review->review_point == 4)
                    <p>4:まあまあ良い</p>
                    @elseif($review->review_point == 5)
                    <p>5:良い</p>
                    @endif
                </div>
            </div>
            <div class="review-content__comment">
                <label for="textarea">[コメント]</label>
                <textarea name="review_comment" cols="30" rows="10" id="textarea" readonly>{{ $review->comment }}</textarea>
            </div>
        </form>
    </div>
</div>
@endsection