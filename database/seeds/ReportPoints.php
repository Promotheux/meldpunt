<?php

use Illuminate\Database\Seeder;

class ReportPoints extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_points')->insert([
            'id' => 1,
            'name' => 'Eikenprocessierups',
            'mapboxId' => 'cjz106bz902gd2orst3gc214w',
            'description' => 'Meldpunt voor de processierups',
            'author' => 'Admin'
        ]);

        DB::table('report_points')->insert([
            'id' => 2,
            'name' => 'Vuurwerkoverlast',
            'mapboxId' => 'cjz10pr3z02g02irsisi6gqlz',
            'description' => 'Meldpunt voor vuurwerkoverlast',
            'author' => 'Admin'
        ]);

    }
}
