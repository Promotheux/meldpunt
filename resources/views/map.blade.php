@extends('layouts.default')

@section('pageTitle')
    {{$report->name}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s9 map">
                <div id="app">

                </div>
            </div>
            <div class="col s3">

            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    </body>
@stop


