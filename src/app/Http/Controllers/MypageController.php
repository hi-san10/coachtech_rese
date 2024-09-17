<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $my_datas = Reservation::with('restaurant')->where('user_id', $request->user_id)->get();

        $number = 1;

        $restaurants = Restaurant::with('prefecture', 'genre', 'favorite')->get();

        foreach($restaurants as $restaurant)
        {
            $restaurant->favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }

        return view('mypage', compact('my_datas', 'number', 'restaurants', 'restaurant'));
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

    public function favorite(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $request->shop_id)->first();
        if(is_null($favorite))
        {
            Favorite::create([
                'user_id' => Auth::id(),
                'restaurant_id' => $request->shop_id
            ]);
        }else{
            Favorite::find($favorite->id)->delete();
        }

        return back();
    }

}
