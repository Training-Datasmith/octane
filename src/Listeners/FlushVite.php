<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

use Illuminate\Foundation\Vite;

class FlushVite
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        if (! $event->sandbox->resolved(Vite::class)) {
            return;
        }

        $vite = $event->sandbox->make(Vite::class);

        if (method_exists($vite, 'flush')) {
            $vite->flush();
        }
    }
}
