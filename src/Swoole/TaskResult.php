<?php

declare(strict_types=1);

namespace Laravel\Octane\Swoole;

class TaskResult
{
    public function __construct(public mixed $result)
    {
    }
}
