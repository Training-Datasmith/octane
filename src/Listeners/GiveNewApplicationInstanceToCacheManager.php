<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

class GiveNewApplicationInstanceToCacheManager
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        if (! $event->sandbox->resolved('cache')) {
            return;
        }

        with($event->sandbox->make('cache'), function ($manager) use ($event): void {
            if (method_exists($manager, 'setApplication')) {
                $manager->setApplication($event->sandbox);
            }
        });
    }
}
