<?php

namespace App\Listeners;

use App\Events\ResetPasswordEvent;
use Illuminate\Support\Facades\Mail;

class ResetPasswordEmail
{
    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ResetPasswordEvent  $event
     * @return void
     */
    public function handle(ResetPasswordEvent $event)
    {
        $user = $event->user;

        Mail::send('emails.reset_password', ['user' => $user], function ($email) use ($user) {
            $email
                ->from('valik.v1per@gmail.com', 'Valentyn Hrynevych')
                ->to($user->email, $user->surname . ' ' . $user->name)
                ->subject('Запит на відновлення паролю')
            ;
        });
    }
}
