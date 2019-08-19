<?php

namespace App\Http\Controllers;


use App\Marker;
use App\ReportPoint;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function loadGeoJson($mapName){
        $report = ReportPoint::where('name', $mapName)->first();
        if($report == null){
           return abort(404);
        }

        $markers = Marker::where('report_point_id', $report->id)->get();
        $unique = $markers->unique('latitude', 'longitude');
        $markers = $unique->values()->all();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach($markers as $marker){

            $lat = (double) $marker['latitude'];
            $lng = (double) $marker['longitude'];

            $geojson['features'][] = [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $lng,
                        $lat
                    ]
                ],
                'properties' => [
                    "location" => $marker['location'],
                    "community" => $marker['community']
                ]
            ];
        
        }

        return json_encode($geojson);


    }
}
