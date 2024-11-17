<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Carbon\CarbonImmutable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        // $my_datas = Reservation::with('restaurant')->join('reviews', 'reservations.id', '=', 'reviews.reservation_id')->get();
        // dd($my_datas);

        $my_datas = Reservation::with('restaurant', 'review')->where('user_id', Auth::id())->get();
        foreach($my_datas as $my_data)
        {
            $my_data->is_review = Review::where('reservation_id', $my_data->id)->exists();
        }

        $current = CarbonImmutable::today()->format('Y-m-d');
        $reservation_number = 1;

        $restaurants = Restaurant::with('prefecture', 'genre', 'favorite')->get();
        foreach($restaurants as $restaurant)
        {
            $restaurant->is_favorite = Favorite::where('user_id', Auth::id())->where('restaurant_id', $restaurant->id)->exists();
        }

        return view('mypage', compact('my_datas', 'current', 'reservation_number', 'restaurants', 'restaurant'));
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

    public function qr_code(Request $request)
    {
        $url = config('app.url').'/'.'my_reservation/'.$request->reservation_id;
        $qr_code = QrCode::size(200)->generate('ec2-54-65-253-1.ap-northeast-1.compute.amazonaws.com'.'/my_reservation'.'/'.$request->reservation_id);
        $reservation_url = '/my_reservation'.'/'.$request->reservation_id;
        // dd($qr_code);
        return view('qr_code', compact('qr_code', 'reservation_url'));
    }
}
