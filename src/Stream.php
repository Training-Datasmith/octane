<?php

declare(strict_types=1);

namespace Laravel\Octane;

use Laravel\SerializableClosure\Support\ClosureStream;
use Throwable;

class Stream
{
    /**
     * Stream the given request information to stdout.
     */
    public static function request(string $method, string $url, int $statusCode, float $duration): void
    {
        fwrite(STDOUT, json_encode([
            'type' => 'request',
            'method' => $method,
            'url' => $url,
            'memory' => memory_get_usage(),
            'statusCode' => $statusCode,
            'duration' => $duration,
        ])."\n");
    }

    /**
     * Stream the given throwable to stderr.
     */
    public static function throwable(Throwable $throwable): void
    {
        $fallbackTrace = str_starts_with($throwable->getFile(), ClosureStream::STREAM_PROTO.'://')
            ? collect($throwable->getTrace())->whereNotNull('file')->first()
            : null;

        Octane::writeError(json_encode([
            'type' => 'throwable',
            'class' => $throwable::class,
            'code' => $throwable->getCode(),
            'file' => $fallbackTrace['file'] ?? $throwable->getFile(),
            'line' => $fallbackTrace['line'] ?? $throwable->getLine(),
            'message' => $throwable->getMessage(),
            'trace' => array_slice($throwable->getTrace(), 0, 2),
        ]));
    }

    /**
     * Stream the given shutdown throwable to stderr.
     */
    public static function shutdown(Throwable $throwable): void
    {
        Octane::writeError(json_encode([
            'type' => 'shutdown',
            'class' => $throwable::class,
            'code' => $throwable->getCode(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
            'message' => $throwable->getMessage(),
            'trace' => array_slice($throwable->getTrace(), 0, 2),
        ]));
    }
}
