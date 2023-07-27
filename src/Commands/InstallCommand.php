<?php

namespace Kolirt\ModelFilter\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model-filter:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install model filter package';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--provider' => 'Kolirt\\ModelFilter\\ServiceProvider']);
    }
}
