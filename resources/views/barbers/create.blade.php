@extends('layouts.app')


@section('content')

<h1>Nueva Barberias</h1>
<div class="card">
    <div class="card-body">

      <form class="form-horizontal" method="POST" action="{{ route('barber.store') }}">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="name" class="col-md-4 control-label">Nombre</label>
              <div class="col-md-6">
                  <input id="nombre" type="text" class="form-control" name="nombre" required autofocus>
              </div>
          </div>

          <div class="form-group">
              <label for="email" class="col-md-4 control-label">Descripcion</label>
              <div class="col-md-6">
                  <input id="descripcion" type="text" class="form-control" name="descripcion">
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Guardar
                  </button>
              </div>
          </div>
      </form>


    </div>
</div>

@endsection
