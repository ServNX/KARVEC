<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class KarvecInstall extends Command
{
    protected $commands = [
        'migrate:fresh',
        'getcandy:install',
        'getcandy:hub:install',
        'getcandy:meilisearch:setup',
        'db:seed'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'karvec:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Karvec';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Installing KARVEC');

        foreach ($this->commands as $command) {
            Artisan::call($command);
        }

        $this->line('Done.');
    }
}
