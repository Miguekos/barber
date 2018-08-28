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
              <th>Caategoria</th>
              <th>Nombre</th>
              <th>Marca</th>
              <th>Peso</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Accion</th>
          </tr>
        </thead>
        <tbody>
        @foreach($produc as $producs)
          <tr>
              <td>{{ $producs->id }}</td>
              <td>{{ $producs->categoria }}</td>
              <td>{{ $producs->nombre }}</td>
              <td>{{ $producs->marca }}</td>
              <td>{{ $producs->peso }}</td>
              <td>{{ $producs->cantidad }}</td>
              <td>{{ $producs->precio }}</td>
              <td width="20%">
                  <form action="{{ route('producto.destroy',$producs->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      {{--<a href="{{ route('producto.show',$producs->id) }}" class="btn btn-sm btn-info">Ver</a>--}}
                      {{--<a href="{{ route('producto.edit',$producs->id) }}" class="btn btn-sm btn-warning">Editar</a>--}}
                      <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                  </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>

@endsection
