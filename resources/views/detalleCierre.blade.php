@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
      <h1>Rerporte de {{ $nombre_cierre }}</h1>
      <hr>
      Recaudado: {{ $suma }} <br>
      Pagar al Barbero: {{ $por_pagar }} <br>
      <hr>
      <h3>Detalle</h3>
      <div class="table-responsive">

      </div>
    </div>
</div>

@endsection
