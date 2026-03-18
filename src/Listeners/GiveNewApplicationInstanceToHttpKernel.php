<?php

declare(strict_types=1);

namespace Laravel\Octane\Listeners;

use Illuminate\Contracts\Http\Kernel;

class GiveNewApplicationInstanceToHttpKernel
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        $event->sandbox->make(Kernel::class)->setApplication($event->sandbox);
    }
}
