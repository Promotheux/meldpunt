<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overzicht/{report_point_name}', function($name){
   $report = \App\ReportPoint::where('name', $name)->first();
   if($report == null){
       abort(404);
   }

   return view('map')->with('report', $report);
});

Route::group(['prefix' => 'data', 'middleware' => 'cors'], function(){
   Route::get('{report_point_name}', 'MapController@loadGeoJson');
});
