@extends('layouts.dashboard')

@section('pageTitle') Dashboard meldpunten
@endsection

@section('content')
  <div class="card material-table">
    <div class="table-header">
      <span class="table-title">Meldpunten</span>
      <div class="actions">
        <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">add</i></a>
        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
      </div>
    </div>
  <table class="table table-hover table-sm material-table" id="rp-table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Naam</th>
      <th>Beschrijving</th>
      <th>Auteur</th>
      <th>Aangemaakt op</th>
      {{-- <th>Opties</th> --}}
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

          $('#rp-table').dataTable({
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
              ajax: '/datatables/meldpunt',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'description', name: 'description' },
                  { data: 'author', name: 'author' },
                  { data: 'created_at', name: 'created_at' }
              ]
          });
      });
  </script>
@endsection
