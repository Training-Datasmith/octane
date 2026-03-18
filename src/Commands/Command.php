<?php

declare(strict_types=1);

namespace Laravel\Octane\Commands;

use Illuminate\Console\Command as BaseCommand;
use Laravel\Octane\Commands\Concerns\InteractsWithIO;

class Command extends BaseCommand
{
    use InteractsWithIO;
}
