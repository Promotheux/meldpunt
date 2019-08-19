<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Marker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myTable = 'markers';

        $data = json_decode(file_get_contents("rups.json"), true);
        foreach($data as $location){

            DB::table($myTable)->insert([
                'report_point_id' => 1,
                'location' => $location['Plaats'],
                'community' => substr($location['Straatnaam'], 0, 25),
                'latitude' => $location['latitude'],
                'longitude' => $location['longitude'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 55))
            ]);
        }

        $data = json_decode(file_get_contents("nl.json"), true);

        foreach($data as $location){
            DB::table($myTable)->insert([
                'report_point_id' => 2,
                'location' => $location['city'],
                'community' => substr($location['admin'], 0, 25),
                'latitude' => $location['lat'],
                'longitude' => $location['lng'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 55))
            ]);
        }
    }
}
