<?php

namespace Laravel\Octane\Listeners;

use Illuminate\Support\NamespacedItemResolver;

class FlushTranslatorCache
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     */
    public function handle($event): void
    {
        if (! $event->sandbox->resolved('translator')) {
            return;
        }

        $translator = $event->sandbox->make('translator');

        if ($translator instanceof NamespacedItemResolver) {
            $translator->flushParsedKeys();
        }
    }
}
