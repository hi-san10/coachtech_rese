<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $shop_name = $request->shop_name;

        return view('review', compact('reservation_id', 'shop_name'));
    }

    public function store(Request $request)
    {
        Review::create([
            'reservation_id' => $request->reservation_id,
            'review_point' => $request->review_point,
            'comment' => $request->review_comment
        ]);

        return redirect('/mypage');
    }

    public function confirm(Request $request)
    {
        $review = Review::where('reservation_id', $request->reservation_id)->first();
        $shop_name = $request->shop_name;

        return view('review_confirm', compact('review', 'shop_name'));
    }
}
