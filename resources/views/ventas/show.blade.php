@extends('layouts.app')

@section('content')
    <h1>Facturas</h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Monto C/U</th>
                        <th>Total</th>
                        <th>Atendido por:</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->nombre }}</td>
                            <td>{{ $venta->categoria }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>{{ $venta->id_monto }}</td>
                            <td>{{ $venta->total }}</td>
                            <td>{{ $venta->atendido}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
