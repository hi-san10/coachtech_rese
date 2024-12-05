<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use Carbon\CarbonImmutable;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
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

    public function change_form(Request $request)
    {
        $my_datas = Reservation::with('restaurant')->where('user_id', Auth::id())->where('restaurant_id', $request->id)->where('id', $request->reservation_id)->first();

        $name = $request->name;

        $current = CarbonImmutable::today()->format('Y-m-d');

        return view('reservation_change', compact('my_datas', 'name', 'current'));
    }

    public function delete(Request $request)
    {
        Reservation::find($request->reservation_id)->delete();
        return back();
    }

    public function update(Request $request)
    {
        Reservation::where('id', $request->id)->update(['date' => $request->date, 'time' => $request->time, 'number_of_people' => $request->number]);

        return redirect(route('mypage'));
    }

    public function reservation_qr(Request $request)
    {
        $my_datas = Reservation::with('restaurant')->whereId($request->id)->first();

        return view('my_reservation', compact('my_datas'));
    }

}
