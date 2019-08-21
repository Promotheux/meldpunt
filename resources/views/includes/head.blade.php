<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="NDC Mediagroep">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Meldpunt - @yield('pageTitle')</title>

{!! MaterializeCSS::include_full() !!}

<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ4OOoujNrDxFvdaBlFaV58cXdYJuCBZ4&libraries=places&language=nl-NL"></script> --}}
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1526040296" />




@yield('customStyles')

@yield('headerScripts')
