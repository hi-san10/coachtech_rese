<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $my_datas = Reservation::with('restaurant')->where('user_id', $request->user_id)->get();

        $number = 1;

        return view('mypage', compact('my_datas', 'number'));
    }

    public function reservation(Request $request)
    {
        Reservation::create([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'number_of_people' => $request->number,
        ]);

        return view('done');
    }

    public function delete(Request $request)
    {
        Reservation::find($request->reserv_id)->delete();
        return back();
    }

}
