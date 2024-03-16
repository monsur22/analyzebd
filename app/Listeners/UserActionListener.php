<?php

namespace App\Listeners;

use App\Events\UserActionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserActionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserActionEvent $event): void
    {
        $user = $event->user;

        // Logic to save additional user addresses
        $user->addresses()->create([
            'details' => 'Demo Address',
        ]);
    }
}
