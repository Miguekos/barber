@extends('layouts.app')


@section('content')

<h1>Barberias <small class="pull-right"><a class="btn btn-xs btn-success" href="{{ route('barber.create') }}">Nueva Barberia</a></small></h1>
<div class="card">
    <div class="card-body">

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        @foreach($barbers as $barber)
        <tbody>
          <tr>
            <td>{{ $barber->id }}</td>
            <td>{{ $barber->nombre }}</td>
            <td>{{ $barber->descripcion }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
</div>

@endsection
