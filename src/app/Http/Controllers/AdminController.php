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

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
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
        $restaurant = Restaurant::all();

        return view('restaurant_owner', compact('restaurant'));
    }

    public function create_shop_top()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('create_shop', compact('prefectures', 'genres'));
    }

    public function edit_shop_top()
    {
        return view('edit_shop');
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

        $restaurant = new Restaurant;
        $restaurant->prefecture_id = $request->prefecture;
        $restaurant->genre_id = $request->genre;
        $restaurant->name = $request->shop_name;
        $restaurant->name_of_reading_kana = $request->name_of_reading_kana;
        $restaurant->storage_image = 'storage/'.$dir.'/'.$file_name;
        $restaurant->save();

        return redirect('/restaurant_owner');
    }
}
