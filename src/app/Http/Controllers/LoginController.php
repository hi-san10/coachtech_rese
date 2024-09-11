<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // $user = $request;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => Str::random(8)
        ]);
        $user = User::where('email', $request->email)->first();
        // dd($user);

        Mail::to($request->email)->send(new SendMail($user));

        return view('auth.verify_email');
    }

    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->where('token', $request->token)->first();

        $email_verified_at = $user->email_verified_at;

        if(is_null($email_verified_at))
        {
            User::where('email', $request->email)->where('token', $request->token)->update(['email_verified_at' => CarbonImmutable::today()]);

            return view('thanks');
        }else{
            return redirect('/login')->with('message', '会員登録がお済みではありません');
        }
    }

        public function login(Request $request)
        {
            $email = $request->email;
            $user = User::where('email', $email)->first();
            $email_verified_at = $user->email_verified_at;

            $credentials = ([
                'email' => $email,
                'password' => $request->password
            ]);

            if(is_null($email_verified_at))
            {
                return redirect('/login');

            }elseif(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect('/');
            }

            return back();
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }
}
