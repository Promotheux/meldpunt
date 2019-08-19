<?php

namespace App\Console\Commands;

use Bakerkretzmar\LaravelMapbox\Facades\Mapbox;
use Illuminate\Console\Command;

class syncTilesets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mapbox:tilesets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all tilesets';

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
        $lists = Mapbox::datasets()->list();
        $ids= [];
        foreach($lists as $list){
            $ids[] = $list->id;
        }



    }
}
