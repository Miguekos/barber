@extends('layouts.app')


@section('content')
<h1>Servicios <small class="pull-right"><a class="btn btn-xs btn-success" href="{{ route('servicio.create') }}">Nuevo Servicio</a></small></h1>
<div class="card">
    <div class="card-body">

      <div class="table-responsive">
      <table id="zero_config" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        @foreach($servicios as $servicio)
        <tbody>
          <tr>
            <td>{{ $servicio->id }}</td>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->precio }} ./s</td>
            <td>{{ $servicio->descripcion }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>

    </div>
</div>

@endsection
