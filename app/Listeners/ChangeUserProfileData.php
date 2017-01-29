<?php

namespace App\Listeners;

use App\Events\CreatingUserEvent;
use App\Models\User;

class ChangeUserProfileData
{
    /**
     * Handle the event.
     *
     * @param  CreatingUserEvent  $event
     * @return void
     */
    public function handle(CreatingUserEvent $event)
    {
        /** @var User $user */
        $user = $event->user;

        $user->status = false;
        $user->role = User::STUDENT_ROLE;
    }
}
