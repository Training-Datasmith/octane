<?php

declare(strict_types=1);

namespace Laravel\Octane\Exceptions;

use Exception;

class TaskTimeoutException extends Exception
{
    /**
     * Creates a new task timeout exception with the given milliseconds.
     *
     * @param  int  $milliseconds
     */
    public static function after($milliseconds): static
    {
        return new static("Task timed out after $milliseconds milliseconds.");
    }
}
