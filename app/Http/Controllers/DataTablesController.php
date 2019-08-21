<?php

namespace App\Http\Controllers;

use App\Marker;
use App\ReportPoint;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataTablesController extends Controller
{
    public function getIndex(){
        return view('datatables.index');
    }

    public function getReportPoints(){
        return DataTables::of(ReportPoint::query())->make(true);
    }

    public function getMarkers(){
        return DataTables::of(Marker::select('markers.*', 'report_points.id as report_id', 'report_points.name as report_points.name')->join('report_points', 'report_points.id', 'report_point_id'))->addColumn('action', function($maker){
          return '<a href="/admin/marker/" class="btn-small waves-effect waves-light green"><i class="material-icons">edit</i><a/> <a href="#remove" class="btn-small waves-effect waves-light red"><i class="material-icons">delete_forever</i><a/>';
        })->make(true);
    }
}
