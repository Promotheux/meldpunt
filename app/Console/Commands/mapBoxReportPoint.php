<?php

namespace App\Console\Commands;

use Bakerkretzmar\LaravelMapbox\Facades\Mapbox;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Console\Command;


class mapBoxReportPoint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mapbox:reportpoint {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a reportpoint in Mapbox';

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
        switch($this->argument('type')){
            case 'list':
                $this->info('Our current datasets');
                $dataset = Mapbox::datasets()->list();

                if(count($dataset) < 1){
                    $this->info('No report points have been found');
                } else {
                    $table = new Table($this->output);
                    $table->setHeaders(['Name', 'ID']);
                    $output = [];
                    for($i=0; $i<count($dataset); $i++){
                       $output[]= ['<fg=red>' . $dataset[$i]['name'] . '</>', '<fg=yellow>' . $dataset[$i]['id'] . '</>'];
                    }
                    $table->setRows($output);

                    $table->render();

                }
                break;
            case 'add':
                $name = $this->ask('Name of Report Point');
                $desc = $this->ask('Description of Report Point');

                $this->line('Name: <fg=yellow>' . $name . '</>');
                $this->line('Description: <fg=yellow>' . $desc . '</>');

                if($this->confirm('Are you sure you want to add the Report Point?')){
                    $dataset = Mapbox::datasets()->create([
                        'name' => $name,
                        'description' => $desc
                    ]);

                    if(!empty($dataset)){
                        $this->info("Report point succesfully added!");
                    }
                }
                break;

        }
    }
}
