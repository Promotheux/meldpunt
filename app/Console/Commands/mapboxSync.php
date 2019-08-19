<?php

namespace App\Console\Commands;

use App\Marker;
use App\ReportPoint;
use Bakerkretzmar\LaravelMapbox\Facades\Mapbox;
use Bakerkretzmar\LaravelMapbox\Mapbox as ModelMapbox;
use Illuminate\Console\Command;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class mapboxSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mapbox:sync {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync data from database to Mapbox Dataset';

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
            case 'all':
                $this->syncReportPoints();
                $this->syncMarkers();
                break;
            case 'reportpoints':
                $this->syncReportPoints();
                break;
            case 'markers':
                $this->syncMarkers();
                break;
        }
    }

    public function syncReportPoints(){
        $reportPoints = ReportPoint::all();
        $output = [];
        foreach($reportPoints as $reportPoint){
            if($reportPoint['mapboxId'] == null) {
                $output[]= Mapbox::datasets()->create([
                    'name' => $reportPoint['name'],
                    'description' => $reportPoint['description']
                ]);
            } else {
                $output[]= Mapbox::datasets($reportPoint['mapboxId'])->update([
                    'name' => $reportPoint['name'],
                    'description' => $reportPoint['description']
                ]);
            }
        }

        foreach($output as $dataset){
            $name = $dataset['name'];
            $id = $dataset['id'];

            $reportPoint = ReportPoint::where('name', $name)->first();
            $reportPoint->mapboxId = $id;
            $reportPoint->save();
        }

        return $this->info('Report points has been synchronized');
    }

    public function syncMarkers(){
        $markers = Marker::all();
        $unique = $markers->unique('latitude', 'longitude');
        $markers = $unique->values()->all();
        $output = [];

        foreach($markers as $marker){
            $reportPoint = ReportPoint::where('id', $marker['report_point_id'])->first();
            if($reportPoint['mapboxId'] !== null){
                $features = Mapbox::datasets($reportPoint['mapboxId'])->features($marker['id']);
                $lat = (double) $marker['latitude'];
                $lng = (double) $marker['longitude'];

                $feature = [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [
                            $lng, $lat
                        ]
                    ],
                    'properties' => [
                        'property' => 'value',
                    ],
                ];


                $output[] = $features->insert($feature);

            } else {
                return $this->info('Meldpunt bestaat nog niet in Mapbox, ' . $marker['id'] . ' wordt overgeslagen');
            }
        }

        return $output;
    }
}
//j4by8cD4beHg