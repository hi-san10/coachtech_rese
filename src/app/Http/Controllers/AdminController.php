<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;
use App\Mail\NoticeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Prefecture;
use App\Models\Genre;
use App\Models\Restaurant;
use App\Models\RestaurantOwner;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function store(Request $request)
    {
        RestaurantOwner::create([
            'name' => $request->name.'代表者',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => CarbonImmutable::today(),
        ]);

        return redirect('admin');
    }

    public function notice_mail()
    {
        return view('create_notice_mail');
    }

    public function notice_send(Request $request)
    {
        $user = User::select('email')->get();
        $email = [
            'subject' => $request->subject,
            'mail_txt' => $request->mail_txt
        ];

        Mail::bcc($user)->send(new NoticeMail($email));

        return redirect('admin');
    }

    public function restaurant_owner()
    {
        return view('restaurant_owner');
    }

    public function create_shop_top()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('create_shop', compact('prefectures', 'genres'));
    }

    public function edit_shop_top()
    {
        $restaurant_owner = RestaurantOwner::find(Auth::id());
        $restaurant = Restaurant::with('prefecture', 'genre')->find($restaurant_owner->restaurant_id);

        return view('edit_shop', compact('restaurant'));
    }

    public function reservation_confirm()
    {
        return view('reservation_confirm');
    }

    public function shop_create(Request $request)
    {
        $dir = $request->shop_name;
        $file_name = $request->file('shop_image')->getClientOriginalName();
        $request->file('shop_image')->storeAs('public/'.$dir, $file_name);

        Restaurant::create([
            'prefecture_id' => $request->prefecture,
            'genre_id' => $request->genre,
            'name' => $request->shop_name,
            'name_of_reading_kana' => $request->name_of_reading_kana,
            'storage_image' => 'storage/'.$dir.'/'.$file_name,
            'detail' => $request->detail
        ]);

        $restaurant = Restaurant::where('name', $request->shop_name)->first();
        $restaurant_id = $restaurant->id;
        RestaurantOwner::where('name', $request->shop_name.'代表者')->update(['restaurant_id' => $restaurant_id]);

        return redirect('/restaurant_owner');
    }

    public function shop_update(Request $request)
    {
        $dir = $request->shop_name;
        $file_name = $request->file('shop_image')->getClientOriginalName();
        $request->file('shop_image')->storeAs('public/'.$dir, $file_name);

        $restaurant_owner = RestaurantOwner::find(Auth::id());
        $restaurant = Restaurant::find($restaurant_owner->restaurant_id)->update(['name' => $request->shop_name, 'name_of_reading_kana' => $request->name_of_reading_kana, 'storage_image' => 'storage/'.$dir.'/'.$file_name]);

        return redirect('/restaurant_owner');
    }
}
