<?php

namespace App\Http\Controllers;

use App\Marker;
use App\ReportPoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $reportpoints = ReportPoint::get()->count();
        $rpToday = ReportPoint::whereDate('created_at', Carbon::today())->get()->count();
        $markers = Marker::get()->count();
        $mToday = Marker::whereDate('created_at', Carbon::today())->get()->count();

        $statics = [
            'reportPoints' => $reportpoints,
            'reportPointsToday' => $rpToday,
            'markers' => $markers,
            'markersToday' => $mToday
        ];

        return view('auth.admin.dashboard')->with('statics', $statics);
    }

    public function account(){
        return view('auth.admin.myaccount');
    }

    public function meldpunt(){
//        $reportPoints = ReportPoint::get();
//        return view('auth.admin.meldpunt')->with('reportpoints', $reportPoints);
      return view('auth.admin.meldpunt'); //Loading with DataTables
    }

    public function marker($report_point_id = false){
      if($report_point_id) {
        $markers = Marker::where('report_point_id', $report_point_id)->paginate(12);
      } else {
        $markers = Marker::paginate(12);
      }

      return view('auth.admin.marker')->with('markers', $markers);
    }
}
