@extends('layouts.app')


@section('content')
    <h1>Nuevo Producto</h1>
    <div class="card">
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('producto.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre" class="col-md-4 control-label">Categoria</label>
                    <div class="col-md-6">
                        <input id="categoria" type="text" class="form-control" value="{{ $categoria }}" name="categoria" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control" value="{{ $nombre }}" name="nombre" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-md-4 control-label">Marca</label>
                    <div class="col-md-6">
                        <input id="marca" type="text" class="form-control" value="{{ $marca }}" name="marca" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Peso" class="col-md-4 control-label">Peso</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $peso }}" name="Peso" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="precio" class="col-md-4 control-label">Cantidad</label>
                    <div class="col-md-6">
                        <input type="number" step="any" class="form-control" value="{{ $cantidad }}" name="cantidad">
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="col-md-4 control-label">precio</label>
                    <div class="col-md-6">
                        <input type="number" step="any" class="form-control" value="{{ $precio }}" name="precio">
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
