<!DOCTYPE html>
<html>
<head>
    @include('includes.app.head')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.ext.js"></script>
</head>
<body class="dash">
    <div class="container-fluid">
        <div class="row outerrow">
            <div class="col s8 m4 l2 sidenav-fixed">
               <nav class="">
                    <header>
                       <div>
                           <span class="profile"><i class="material-icons left">person</i></span>
                           <h3>{{ Auth::user()->name }} <a href="/logout"><i class="material-icons right">power_settings_new</i></a></h3>
                       </div>
                   </header>
                   <ul>
                       <li>Navigatie</li>
                       <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="/admin">Overzicht<i class="material-icons left">view_module</i></a></li>
                       <li class="{{ (request()->segment(2) == 'meldpunt') ? 'active' : '' }}"><a href="/admin/meldpunt">Meldpunten<i class="material-icons left">map</i></a></li>
                       <li class="{{ (request()->segment(2) == 'marker') ? 'active' : '' }}"><a href="/admin/marker">Markers<i class="material-icons left">location_on</i></a></li>
                   </ul>
                </nav>
            </div>

            <div class="content col s8 m8 l10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
