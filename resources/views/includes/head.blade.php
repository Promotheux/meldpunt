<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="NDC Mediagroep">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Meldpunt - @yield('pageTitle')</title>

{!! MaterializeCSS::include_full() !!}

<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ4OOoujNrDxFvdaBlFaV58cXdYJuCBZ4&libraries=places&language=nl-NL"></script>




@yield('customStyles')

@yield('headerScripts')
