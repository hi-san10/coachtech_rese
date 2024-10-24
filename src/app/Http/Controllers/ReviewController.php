<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Reservation;


class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $shop_name = $request->shop_name;

        return view('review', compact('reservation_id', 'shop_name'));
    }

    public function review(Request $request)
    {
        Review::create([
            'reservation_id' => $request->reservation_id,
            'review_point' => $request->review_point,
            'comment' => $request->review_comment
        ]);

        return redirect('/mypage');
    }

    public function reviewconfirm(Request $request)
    {
        $review = Review::where('reservation_id', $request->reservation_id)->first();
        $shop_name = $request->shop_name;

        return view('reviewconfirm', compact('review', 'shop_name'));
    }
}