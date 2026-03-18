<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

class GiveNewApplicationInstanceToFilesystemManager
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        if (! $event->sandbox->resolved('filesystem')) {
            return;
        }

        with($event->sandbox->make('filesystem'), function ($manager) use ($event): void {
            $manager->setApplication($event->sandbox);
        });
    }
}
