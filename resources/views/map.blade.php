@extends('layouts.default')

@section('pageTitle')
    {{$report->name}}
@endsection

@section('headerScripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ4OOoujNrDxFvdaBlFaV58cXdYJuCBZ4&libraries=places&language=nl-NL"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s9 map">
                <div id="app">
                    <google-map geosource="{{ strtolower($report->name) }}"></google-map>
                    <map-controls formsource="{{ strtolower($report->name) }}"></map-controls>
                </div>
            </div>
            <div class="col s3">

            </div>
        </div>
    </div>
@endsection


