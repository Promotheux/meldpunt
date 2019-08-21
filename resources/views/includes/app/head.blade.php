<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="NDC Mediagroep">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Meldpunt - @yield('pageTitle')</title>

{!! MaterializeCSS::include_full() !!}

<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@yield('customStyles')

@yield('headerScripts')
