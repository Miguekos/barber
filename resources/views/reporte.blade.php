@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
      <h1>Rerporte de {{ $nombre }}</h1> <small>Entrel el dia {{ $fecha_inicio }} y el dia {{ $fecha_fin }}</small>
      <hr>
      Recaudado: {{ $suma }} <br>
      Pagar al Barbero: {{ $por_pagar }} <br>
      <hr>
      <h3>Detalle</h3>
      <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Servicio</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            @foreach($report as $reports)
            <tr>
              <td>{{ $reports->id }}</td>
              <td>{{ $reports->motivo }}</td>
              <td>{{ $reports->valor }} ./s </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>

@endsection
