<?php

namespace App\Providers;

use App\Events\CreatingUserEvent;
use App\Events\ResetPasswordEvent;
use App\Listeners\ChangeUserProfileData;
use App\Listeners\ResetPasswordEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ResetPasswordEvent::class => [
            ResetPasswordEmail::class,
        ],
        CreatingUserEvent::class => [
            ChangeUserProfileData::class,
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
