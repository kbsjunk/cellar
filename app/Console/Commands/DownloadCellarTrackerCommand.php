<?php

namespace Cellar\Console\Commands;

use Illuminate\Console\Command;
use Cellar\CellarTracker\Downloader;

class DownloadCellarTrackerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cellar:download
        {table : The CellarTracker API table to download.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download a table from the CellarTracker API.';

    protected $downloader;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Downloader $downloader)
    {
        parent::__construct();
        $this->downloader = $downloader;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->downloader->get($this->argument('table'));
    }
}
