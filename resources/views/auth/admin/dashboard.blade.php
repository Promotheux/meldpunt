@extends('layouts.dashboard')

@section('pageTitle') Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col s4 m3 l3 reportpoints panel">
            <h3>Aantal Meldpunten<i class="material-icons left">map</i></h3>
            <span class="today">Vandaag</span>
            <span class="statics">{{ $statics['reportPointsToday'] }}</span>
        </div>
        <div class="col s4 m3 l3 markers panel">
            <h3>Aantal Meldingen<i class="material-icons left">location_on</i></h3>
            <span class="today">Vandaag</span>
            <span class="statics">{{ $statics['markersToday'] }}</span>
        </div>
        <div class="col s4 m3 l3 reportpoints panel">
            <h3>Totaal aantal Meldpunten <i class="material-icons left">map</i></h3>
            <span>{{ $statics['reportPoints'] }}</span>
        </div>
        <div class="col s4 m3 l3 markers panel">
            <h3>Totaal aantal Meldingen <i class="material-icons left">location_on</i></h3>
            <span>{{ $statics['markers'] }}</span>
        </div>
    </div>
@endsection