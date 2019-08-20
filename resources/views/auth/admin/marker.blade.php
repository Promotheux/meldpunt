@extends('layouts.dashboard')

@section('pageTitle') Dashboard markers
@endsection

@section('content')
  <table class="table table-hover table-sm">
    <thead>
    <tr>
      <th>ID</th>
      <th>Locatie</th>
      <th>Gemeente</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Aangemaakt op</th>
      <th>Opties</th>
    </tr>
    </thead>
    <tbody>
    @foreach($markers as $marker)
      <tr>
        <td>{{ $marker->id }}</td>
        <td>{{ $marker->location }}</td>
        <td>{{ $marker->community }}</td>
        <td>{{ $marker->latitude }}</td>
        <td>{{ $marker->longitude }}</td>
        <td>{{ $marker->created_at }}</td>
        <td>
          <a href="" class="btn btn-small btn-info">Bewerken</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="pagination">{{$markers->links('vendor.pagination.materializecss')}}</div>
@endsection
