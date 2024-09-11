<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;

class ShopController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::with('prefecture', 'genre')->get();
        return view('shop_all', compact('restaurant'));
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
