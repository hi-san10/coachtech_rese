<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Carbon\CarbonImmutable;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $my_datas = Reservation::with('restaurant')->where('user_id', $request->user_id)->get();

        $current = CarbonImmutable::today()->format('Y-m-d');
        $number = 1;

        $restaurants = Restaurant::with('prefecture', 'genre', 'favorite')->get();
        foreach($restaurants as $restaurant)
        {
            $restaurant->is_favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }

        return view('mypage', compact('my_datas', 'current', 'number', 'restaurants', 'restaurant'));
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
