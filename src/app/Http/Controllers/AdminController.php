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
use App\Models\Reservation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function store(AdminRequest $request)
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
        $disk = Storage::disk('s3');
        // $disk->url('reses3_bucket/rese_restaurant/restaurant_38.jpg');
        // dd($disk->url('reses3_bucket/rese_restaurant/restaurant_38.jpg'));
        return view('restaurant_owner', compact('disk'));
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

    public function reservation_confirm(Request $request)
    {
        $restaurant_owner = RestaurantOwner::find(Auth::id());
        // dd($restaurant_owner);
        $reservations = Reservation::with('user')->where('restaurant_id', $restaurant_owner->restaurant_id)->get();
        dd($reservations);
        return view('reservation_confirm', compact('reservations'));
    }

    public function shop_create(Request $request)
    {
        Restaurant::create([
            'prefecture_id' => $request->prefecture,
            'genre_id' => $request->genre,
            'name' => $request->shop_name,
            'name_of_reading_kana' => $request->name_of_reading_kana,
            'detail' => $request->detail
        ]);

        $restaurant = Restaurant::where('name', $request->shop_name)->first();
        $restaurant_id = $restaurant->id;
        RestaurantOwner::where('name', $request->shop_name.'代表者')->update(['restaurant_id' => $restaurant_id]);

        $file_extension = $request->file('shop_image')->getClientOriginalExtension();
        // Storage::disk('s3')->('rese_restaurant', 'restaurant_'.$restaurant_id.'.'.$file_extension);
        $file = $request->file('shop_image');
        $dir = 'rese_restaurant/';
        $upload_file = Storage::disk('s3')->putFileAs('/'.$dir, $file, 'restaurant_'.$restaurant_id.'.'.$file_extension);
        $restaurant->update(['storage_image' => $upload_file]);
        // dd($upload_file);
        // $request->file('shop_image')->storeAs('public/restaurant_images', 'restaurant_'.$restaurant_id.'.'.$file_extension);

        // $restaurant->update(['storage_image' => 'storage/restaurant_images/restaurant_'.$restaurant_id.'.'.$file_extension]);


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
