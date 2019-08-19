@extends('layouts.default')

@section('pageTitle')
    {{$report->name}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s9 map">
                <div id="app">
                    <google-map></google-map>
                    <map-controls></map-controls>
                </div>
            </div>
            <div class="col s3">

            </div>
        </div>
    </div>
@stop


