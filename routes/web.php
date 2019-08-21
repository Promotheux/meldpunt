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

Route::group(['prefix' => 'forms', 'middleware' => 'cors'], function(){
  Route::get('{report_point_name}', 'FormController@loadForm');
});


Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['prefix' => 'admin'], function(){
    Auth::routes();
    Route::get('/', 'AdminController@index');
    Route::get('/meldpunt', 'AdminController@meldpunt');
    Route::get('/marker/{report_point_id?}', 'AdminController@marker');

});

Route::get('/datatables/meldpunt', 'DataTablesController@getReportPoints')->name('datatables.meldpunten');
Route::get('/datatables/marker/{report_point_id?}', 'DataTablesController@getMarkers')->name('datatables.markers');
