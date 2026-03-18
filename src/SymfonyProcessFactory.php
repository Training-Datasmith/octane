<?php

namespace Laravel\Octane;

use Symfony\Component\Process\Process;

class SymfonyProcessFactory
{
    /**
     * Create a new Symfony process instance.
     *
     * @param  mixed|null  $input
     */
    public function createProcess(array $command, ?string $cwd = null, ?array $env = null, $input = null, ?float $timeout = 60): \Symfony\Component\Process\Process
    {
        return new Process($command, $cwd, $env, $input, $timeout);
    }
}
