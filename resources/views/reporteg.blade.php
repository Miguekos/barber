@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Rerporte de {{ $nombre_barber }}</h1>
            <hr>
            <div class="container col-md-2 text-center">
                <label for="">Total en Efectivo:</label>
                <input type="text" readonly class="form-control" value="{{ number_format($efectivov, 2) }}">
            </div>
            <div class="container col-md-2 text-center">
                <label for="">Total por Visa:</label>
                <input type="text" readonly class="form-control" value="{{ number_format($tarjetav, 2) }}">
            </div>
            {{--<b><u>Total en Efectivo:</u></b> {{ number_format($efectivov, 2) }} <br>--}}
            {{--<b><u>Total por Visa:</u></b> {{ number_format($tarjetav, 2) }}  <br>--}}
            <hr>
            {{--Recaudado: {{ $suma }} <br>--}}
            {{--Pagar al Barbero: {{ $por_pagar }} <br>--}}

            <h3 class="text-center">Detallede de Cortes <small>Total en Cortes: {{ $sumac }} S./</small></h3>
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

            <h3 class="text-center">Detallede de Ventas <small>Total en Ventas: {{ $sumav }}</small></h3>
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
    <div class="card">
        <div class="card-body">
            {{--<h1>Rerporte de Cierres</h1> <small>Entrel el dia {{ $fecha_inicio }} y el dia {{ $fecha_fin }}</small>--}}

            <h3 class="text-center">Detallede de Cierres <small></small></h3>
            <div class="table-responsive">
                <table id="example3" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Cortes</th>
                        <th>Cant. Cortes</th>
                        <th>Prodcutos</th>
                        <th>Sueldos</th>
                        <th>Ganancia</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cierre as $cierres)
                        <tr>
                            <td>{{ $cierres->id }}</td>
                            <td>{{ $cierres->ventas_cortes }}</td>
                            <td>{{ $cierres->cantidad_cortes }}</td>
                            <td>{{ $cierres->ventas_productos }}</td>
                            <td>{{ $cierres->por_pagar }}</td>
                            <td>{{ $cierres->ganancia }}</td>
                            <td>{{ $cierres->ganancia }}</td>
                            <td>{{ $cierres->fecha }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endsection