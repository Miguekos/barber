@extends('layouts.app')

@section('content')
<h1>Reportes diario {{ date('d-m-Y') }}</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('reporte') }}" method="post">
          {{ csrf_field() }}
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Barberia</th>
                  <th>Porcentaje</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody>
                @foreach($usuario as $usuarios)
                <tr>
                  <td>{{ $usuarios->id }}</td>
                  <td>{{ $usuarios->name }}</td>
                  <td>{{ $usuarios->porcent }}</td>
                  <td>{{ $usuarios->barber }}</td>
                  <td>
                    <form action="{{ route('barberos.store') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="barbero_id" value="{{ $usuarios->id }}">
                      <input type="hidden" name="porcent" value="{{ $usuarios->porcent }}">
                      <input type="hidden" name="nombre" value="{{ $usuarios->name }}">
                      <input type="submit" class="btn btn-ms btn-success" name="" value="Acividad del dia">
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>


          </div>
        </form>
        </div>
      </div>
@endsection
