<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::with('prefecture', 'genre')->get();
        // $is_favorite = Favorite::where('user_id', Auth::id())->get();
        foreach($restaurants as $restaurant)
        {
            $restaurant->is_favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }
        return view('shop_all', compact('restaurants', 'restaurant'));
    }

    public function detail(Request $request)
    {
        $restaurants = Restaurant::with('prefecture', 'genre')->whereId($request->shop_id)->first();
        return view('detail', compact('restaurants'));
    }

    public function search(Request $request)
    {
        $restaurant = Restaurant::with('prefecture', 'genre')->RestaurantSearch($request->prefecture_id)->GenreSearch($request->genre_id)->NameSearch($request->name)->get();

        return view('shop_all', compact('restaurant'));
    }

}
