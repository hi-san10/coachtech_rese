<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

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

    public function delete(Request $request)
    {
        Reservation::find($request->reserv_id)->delete();
        return back();
    }

    public function update(Request $request)
    {
        Reservation::where('user_id', Auth::id())->where('restaurant_id', $request->id)->update(['date' => $request->date, 'time' => $request->time, 'number_of_people' => $request->number]);

        return back();
    }

}
