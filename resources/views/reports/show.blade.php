@extends('layouts.app')

@section('content')
<h1>Reporte General</h1>
<div class="card">
    <div class="card-body">

        <form action="{{ route('reporteshow') }}" method="post">
            {{ csrf_field() }}

            <div class="col-md-12">

                <div class="form-group col-md-4">
                    <label>Inicio</label>
                    <input class="form-control" type="datetime-local" name="inicio">
                </div>
                <div class="form-group col-md-4">
                    <label>Fin</label>
                    <input class="form-control" type="datetime-local" name="fin">
                </div>

                <div class="form-group col-md-4">
                    <label>Barbero</label>
                    <select class="form-control" name="barbero">
                        <option value=""></option>
                        @foreach($barberos as $barbero)
                            <option value="{{ $barbero->barber_id }}">{{ $barbero->barber }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4 col-md-offset-4">
                <input type="submit" class="btn btn-info btn-block" value="Buscar">
            </div>

        </form>
    </div>
</div>
@endsection