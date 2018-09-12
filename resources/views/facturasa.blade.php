@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Facturas de {{ $nombre_barber }}</h1>
            <hr>
            <h3>Detalle</h3>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Cant.</th>
                        <th>Total</th>
                        <th>Atendido</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($venta as $ventas)
                        <tr>
                            <td>{{ $ventas->id }}</td>
                            <td>{{ $ventas->categoria }}</td>
                            <td>{{ $ventas->nombre }} ./s </td>
                            <td>{{ $ventas->cantidad }}</td>
                            <td>{{ $ventas->total }}</td>
                            <td>{{ $ventas->atendido }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection