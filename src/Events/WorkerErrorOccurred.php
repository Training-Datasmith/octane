<?php

declare(strict_types=1);

namespace Laravel\Octane\Events;

use Illuminate\Foundation\Application;
use Throwable;

class WorkerErrorOccurred
{
    public function __construct(public Throwable $exception, public Application $sandbox)
    {
    }
}
