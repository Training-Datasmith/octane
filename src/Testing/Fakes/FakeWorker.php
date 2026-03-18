<?php

declare(strict_types=1);

namespace Laravel\Octane\Testing\Fakes;

use Laravel\Octane\RequestContext;
use Laravel\Octane\Worker;

class FakeWorker extends Worker
{
    public function run(): void
    {
        foreach ($this->client->requests as $request) {
            [$request, $context] = $this->client->marshalRequest(
                new RequestContext(['request' => $request])
            );

            $this->handle($request, $context);
        }
    }

    public function runTasks()
    {
        return collect($this->client->requests)->map(fn ($data): mixed => $this->handleTask($data))->all();
    }

    public function runTicks()
    {
        return collect($this->client->requests)->map(fn () => $this->handleTick())->all();
    }
}
