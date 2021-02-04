<?php

namespace TaNteE\LaravelModelApi\Commands;

use Illuminate\Console\Command;

class LaravelModelApiCommand extends Command
{
    public $signature = 'laravel-model-api';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
