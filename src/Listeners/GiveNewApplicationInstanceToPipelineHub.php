<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

use Illuminate\Contracts\Pipeline\Hub;

class GiveNewApplicationInstanceToPipelineHub
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        if (! $event->sandbox->resolved(Hub::class)) {
            return;
        }

        with($event->sandbox->make(Hub::class), function ($hub) use ($event): void {
            $hub->setContainer($event->sandbox);
        });
    }
}
