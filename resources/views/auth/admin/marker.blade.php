@extends('layouts.dashboard')

@section('pageTitle') Dashboard markers
@endsection

@section('content')
  <div class="card material-table">
    <div class="table-header">
      <span class="table-title">Markers</span>
      <div class="actions">
        <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">add</i></a>
        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
      </div>
    </div>
  <table class="table table-hover table-sm" id="marker-table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Meldpunt</th>
      <th>Locatie</th>
      <th>Gemeente</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Aangemaakt op</th>
      <th>Opties</th>
    </tr>
    </thead>
  </table>

  <script>
      $(document).ready(function() {
          $('.search-toggle').click(function() {
              if ($('.hiddensearch').css('display') == 'none')
                  $('.hiddensearch').slideDown();
              else
                  $('.hiddensearch').slideUp();
          });

          $('#marker-table').dataTable({
              "oLanguage": {
                  "sStripClasses": "",
                  "sSearch": "",
                  "sSearchPlaceholder": "Zoeken...",
                  "sInfo": "_START_ -_END_ of _TOTAL_",
                  "sLengthMenu": '<span>Rijen per pagina:</span><select class="browser-default">' +
                      '<option value="10">10</option>' +
                      '<option value="20">20</option>' +
                      '<option value="30">30</option>' +
                      '<option value="40">40</option>' +
                      '<option value="50">50</option>' +
                      '<option value="-1">All</option>' +
                      '</select></div>'
              },
              bAutoWidth: false,
              processing: true,
              serverSide: true,
              ajax: (document.location.pathname).replace('admin', 'datatables'),
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'report_points.name', name: 'report_points.name'},
                  { data: 'location', name: 'location' },
                  { data: 'community', name: 'community' },
                  { data: 'latitude', name: 'latitude' },
                  { data: 'latitude', name: 'longitude' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'action', name: 'action', orderable: false, searchable: false}
              ]
          });
      });
  </script>

@endsection
