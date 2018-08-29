@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            {{--<h1>Rerporte de {{ $nombre_barbero }}</h1> <small>Entrel el dia {{ $fecha_inicio }} y el dia {{ $fecha_fin }}</small>--}}

            {{--Recaudado: {{ $suma }} <br>--}}
            {{--Pagar al Barbero: {{ $por_pagar }} <br>--}}

            <h3>Detallede de Cortes <small>Total en Cortes: {{ $sumac }}</small></h3>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corte as $cortes)
                        <tr>
                            <td>{{ $cortes->id }}</td>
                            <td>{{ $cortes->motivo }}</td>
                            <td>{{ $cortes->valor }} ./s </td>
                            <td>{{ $cortes->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {{--<h1>Rerporte de {{ $nombre_barbero }}</h1> <small>Entrel el dia {{ $fecha_inicio }} y el dia {{ $fecha_fin }}</small>--}}

            {{--Recaudado: {{ $suma }} <br>--}}
            {{--Pagar al Barbero: {{ $por_pagar }} <br>--}}

            <h3>Detallede de Ventas <small>Total en Ventas: {{ $sumav }}</small></h3>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($venta as $ventas)
                        <tr>
                            <td>{{ $ventas->id }}</td>
                            <td>{{ $ventas->nombre}}</td>
                            <td>{{ $ventas->cantidad }}</td>
                            <td>{{ $ventas->total }} ./s </td>
                            <td>{{ $ventas->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endsection
