<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OptionService;

class CacheStaticData extends Command
{
    protected $signature = 'cache:static-data';
    protected $description = 'Cache all static data for user registration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(OptionService $optionService)
    {
        $optionService->cacheOptions();
        $this->info('Static data cached successfully.');
    }
}
