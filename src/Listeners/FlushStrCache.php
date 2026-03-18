<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

use Illuminate\Support\Str;

class FlushStrCache
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        Str::flushCache();
    }
}
