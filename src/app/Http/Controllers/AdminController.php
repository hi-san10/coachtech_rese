<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;
use App\Mail\NoticeMail;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($user)->send(new NoticeMail($email));

        return redirect('admin');
    }
}
