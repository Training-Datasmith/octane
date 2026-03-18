<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

class GiveNewRequestInstanceToApplication
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        $event->app->instance('request', $event->request);
        $event->sandbox->instance('request', $event->request);
    }
}
