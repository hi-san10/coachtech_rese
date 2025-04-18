<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;
use App\Mail\NoticeMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChangeMail;
use App\Models\Prefecture;
use App\Models\Genre;
use App\Models\Restaurant;
use App\Models\RestaurantOwner;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
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

    public function restaurant_owner(Request $request)
    {
        // dd($request->session()->all());
        return view('restaurant_owner');
    }

    public function create_shop_top()
    {
        $restaurant_owner = RestaurantOwner::whereId(Auth::guard('restaurant_owners')->id())->first();
        if(is_null($restaurant_owner->restaurant_id))
        {
            $prefectures = Prefecture::all();
            $genres = Genre::all();
            return view('create_shop', compact('prefectures', 'genres'));
        }else{
            return redirect('restaurant_owner')->with('message', '店舗作成済みです');
        }
    }

    public function edit_shop_top(Request $request)
    {
        $restaurant_owner = RestaurantOwner::whereId(Auth::guard('restaurant_owners')->id())->first();
        if(is_null($restaurant_owner->restaurant_id))
        {
            return redirect('restaurant_owner')->with('message_2', '店舗を作成されてません');
        }else
        {
        $restaurant = Restaurant::with('prefecture', 'genre')->whereId($restaurant_owner->restaurant_id)->first();
        dd($request->session('laravel_session'));

        return view('edit_shop', compact('restaurant'));
        }
    }

    public function reservation_confirm(Request $request)
    {
        $restaurant_owner = RestaurantOwner::find(Auth::guard('restaurant_owners')->id());
        $reservations = Reservation::with('user')->where('restaurant_id', $restaurant_owner->restaurant_id)->whereDate('date', '>=', CarbonImmutable::today())->oldest('date')->get();
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
        RestaurantOwner::where('id', Auth::guard('restaurant_owners')->id())
            ->update(['restaurant_id' => $restaurant_id]);

        $file_extension = $request->file('shop_image')->getClientOriginalExtension();
        $file = $request->file('shop_image');
        $dir = 'rese_restaurant';

        if(config('app.env') == 'local')
        {
            $request->file('shop_image')->storeAs('public/restaurant_images', 'restaurant_'.$restaurant_id.'.'.$file_extension);
            $restaurant->update(['storage_image' => 'storage/restaurant_images/restaurant_'.$restaurant_id.'.'.$file_extension]);
        }
        else{
            $upload_file = Storage::disk('s3')->putFileAs($dir, $file, 'restaurant_'.$restaurant_id.'.'.$file_extension);
            $restaurant->update(['storage_image' => $upload_file]);
        }

        return redirect('/restaurant_owner');
    }

    public function shop_update(Request $request)
    {
        $restaurant_owner = RestaurantOwner::with('restaurant')->find(Auth::guard('restaurant_owners')->id());

        $file_extension = $request->file('shop_image')->getClientOriginalExtension();

        if(config('app.env') == 'local')
        {
            $storage_image = $restaurant_owner->restaurant->storage_image;
            $path = substr($storage_image, 7, 50);
            Storage::disk('public')->delete($path);
            $request->file('shop_image')->storeAs('public/restaurant_images', 'restaurant_'.$restaurant_owner->restaurant_id.'.'.$file_extension);
            Restaurant::find($restaurant_owner->restaurant_id)->update([
                'name' => $request->shop_name,
                'name_of_reading_kana' => $request->name_of_reading_kana,
                'storage_image' => 'storage/restaurant_images/restaurant_'.$restaurant_owner->restaurant_id.'.'.$file_extension]);
        }else{

        }
        $restaurant_owner->update(['name' => $request->shop_name.'代表者']);

        return redirect('/restaurant_owner');
    }

    public function passwordChange_mail(Request $request)
    {
        $restaurant_owner = RestaurantOwner::find(Auth::guard('restaurant_owners')->id());

        Mail::to($restaurant_owner->email)->send(new PasswordChangeMail($restaurant_owner));

        return view('sent_mail');
    }

    public function change_password(Request $request)
    {
        $restaurant_owner = RestaurantOwner::find($request->id);

        return view('password_change', compact('restaurant_owner'));
    }

    public function password_change(Request $request)
    {
        $restaurant_owner = RestaurantOwner::find($request->id);
        $restaurant_owner->update(['password' => Hash::make($request->new_password)]);

        return redirect('restaurant_owner');
    }
}
