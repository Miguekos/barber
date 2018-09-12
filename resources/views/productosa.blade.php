@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Producto de {{ $nombre_barber }}</h1>
            <hr>
            <h3>Detalle</h3>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Cant.</th>
                        <th>Precio</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($producto as $productos)
                        <tr>
                            <td>{{ $productos->id }}</td>
                            <td>{{ $productos->categoria }}</td>
                            <td>{{ $productos->nombre }} ./s </td>
                            <td>{{ $productos->marca }}</td>
                            <td>{{ $productos->cantidad }}</td>
                            <td>{{ $productos->precio }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection