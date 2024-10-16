<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reminder;
use App\Models\User;
use App\Models\Reservation;
use Carbon\CarbonImmutable;

class ReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約日前日に予約確認メール送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info('k');

        $current = CarbonImmutable::today();
        $reservations = Reservation::with('user', 'restaurant')->whereDate('date', $current)->get();

        foreach($reservations as $reservation)
        {
            Mail::to($reservation->user->email)->send(new Reminder($reservation));
        }
    }
}
