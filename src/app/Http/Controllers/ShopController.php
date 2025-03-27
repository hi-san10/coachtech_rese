<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::with('prefecture', 'genre')->get();

        foreach($restaurants as $restaurant)
        {
            $restaurant->is_favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }
        return view('shop_all', compact('restaurants'));
    }

    public function detail(Request $request)
    {
        $restaurant = Restaurant::with('prefecture', 'genre')->whereId($request->shop_id)->first();

        $current = CarbonImmutable::today()->format('Y-m-d');

        return view('detail', compact('restaurant', 'current'));
    }

    public function search(Request $request)
    {
        $restaurants = Restaurant::with('prefecture', 'genre', 'favorite')->RestaurantSearch($request->prefecture_id)->GenreSearch($request->genre_id)->NameSearch($request->name)->get();
        foreach($restaurants as $restaurant)
        {
            $restaurant->is_favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }

        return view('shop_all', compact('restaurants', 'restaurant'));
    }
}
