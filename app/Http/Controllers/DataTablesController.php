<?php

namespace App\Http\Controllers;

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

}
