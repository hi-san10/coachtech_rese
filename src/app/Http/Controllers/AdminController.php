<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;

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
            'authorify' => '2'
        ]);

        return redirect('admin');
    }
}
