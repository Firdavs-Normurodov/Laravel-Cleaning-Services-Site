<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\PostCreated;
use App\Listeners\SendEmailToUser;
use App\Listeners\SendNotificationToAdmin;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreated::class => [
            SendEmailToUser::class,
            SendNotificationToAdmin::class
        ]
    ];

    public function boot(): void
    {
        //
    }
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
