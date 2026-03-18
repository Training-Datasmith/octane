<?php

declare(strict_types=1);

namespace Laravel\Octane\Events;

use Illuminate\Foundation\Application;

class WorkerStarting
{
    public function __construct(public Application $app)
    {
    }
}
