<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Mail\verfiyEmail;
use App\Services\Notification\Notification;

class SendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\VideoCreated  $event
     * @return void
     */
    public function handle(VideoCreated $event)
    {
        $notification = new Notification($event->user, new verfiyEmail($event->user));
        $notification->sendEmail();
    }
}
