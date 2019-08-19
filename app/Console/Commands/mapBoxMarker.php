<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class mapBoxMarker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mapbox:marker {datasetId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a marker inside a Mapbox Dataset';

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
     * @return mixed
     */
    public function handle()
    {
        $this->ask('');

        $this->confirm('Add the marker?');
    }
}
