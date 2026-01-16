<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshProject extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear and cache all necessary project files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Refreshing Project...');
        $commands = [
            'cache:clear',
            'route:clear',
            'config:clear',
            'view:clear',
            'event:clear',
            'route:cache',
            'config:cache',
            'view:cache',
            'queue:work',
            'optimize',
        ];
        foreach ($commands as $command) {
            Artisan::call($command);
            $this->info("Executed: $command");
        }
        $this->info('Project refreshed successfully!');
        return Command::SUCCESS;
    }
}
