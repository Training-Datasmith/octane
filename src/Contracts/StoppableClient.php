<?php

declare(strict_types=1);

namespace Laravel\Octane\Contracts;

interface StoppableClient extends Client
{
    /**
     * Stop the underlying server / worker.
     */
    public function stop(): void;
}
