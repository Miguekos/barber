@extends('layouts.app')

@section('content')

<h1>Productos <small class="pull-right"><a class="btn btn-xs btn-success" href="{{ route('producto.create') }}">Nueva Prodcutos</a></small></h1>
<div class="card">
    <div class="card-body">

      <div class="table-responsive">
      <table id="zero_config" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $productos)
          <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>{{ $producto->categoria }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>

@endsection
