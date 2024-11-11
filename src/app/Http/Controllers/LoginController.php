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
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Admin_user;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        if(Auth::check())
        {
            return redirect('/login');
        }else{
            return view('register');
        }
    }

    public function store(RegisterRequest $request)
    {
        do
        {
        $token = Str::random(8);
        $existing_random_str = User::where('token', $token)->first();
        } while (!is_null($existing_random_str));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token

        ]);
        $user = User::where('email', $request->email)->first();

        Mail::to($request->email)->send(new SendMail($user));

        return view('auth.verify_email');
    }

    public function verify(Request $request)
    {
        $user = User::where('token', $request->token)->first();

        $email_verified_at = $user->email_verified_at;

        if(is_null($email_verified_at))
        {
            User::where('token', $request->token)->update(['email_verified_at' => CarbonImmutable::today()]);

            return view('thanks');
        }else{
            return redirect('/login')->with('message', '会員登録がお済みではありません');
        }
    }

        public function login(LoginRequest $request)
        {
            $email = $request->email;
            $user = User::where('email', $email)->first();
            $email_verified_at = $user->email_verified_at;

            $credentials = ([
                'email' => $email,
                'password' => $request->password
            ]);

            // 管理者と店舗代表者は違う画面に遷移するようにする
            if(is_null($email_verified_at))
            {
                return redirect('/login');

            }elseif(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect('/');
            }elseif(Auth::attempt($credentials) && $authorify == 1)
            {
                $request->session()->regenerate();
                return redirect('/admin');
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
