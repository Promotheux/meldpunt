@extends('layouts.dashboard')

@section('pageTitle') Dashboard meldpunten
@endsection

@section('content')
  <table class="table table-hover table-sm">
    <thead>
    <tr>
      <th>ID</th>
      <th>Naam</th>
      <th>Beschrijving</th>
      <th>Auteur</th>
      <th>Aangemaakt op</th>
      <th>Opties</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reportpoints as $reportpoint)
      <tr>
        <td>{{ $reportpoint->id }}</td>
        <td>{{ $reportpoint->name }}</td>
        <td>{{ $reportpoint->description }}</td>
        <td>{{ $reportpoint->author }}</td>
        <td>{{ $reportpoint->created_at }}</td>
        <td>
          <a href="" class="btn btn-small btn-info">Bewerken</a>
          <a href="/admin/marker/{{$reportpoint->id}}" class="btn btn-small btn-info">Bekijk markers</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
