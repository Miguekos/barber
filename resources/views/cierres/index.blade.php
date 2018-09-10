@extends('layouts.app')

@section('content')
<h1>Cierres</h1>
<div class="card">
    <div class="card-body">
      <h5 class="card-title"><u>Contabilidad</u></h5>
      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
      <form action="{{ route('cierre.store') }}" method="post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-2">
              <label for="">Cortes <b><u>{{ $cantidad_cortes }}</u></b></label>
                <input type="text" name="ventas_cortes" readonly value="{{ $recaudado }}" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Productos</label>
                <input type="text" name="ventas_productos" readonly value="{{ $productos }}" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Pagos a Personal</label>
                <input type="text" readonly name="por_pagar" value="{{ $por_pagar }}"  class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Ganancia</label>
                <input type="text" readonly name="ganancia" value="{{ $ganancia }}" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Total</label>
                <input type="text" readonly name="ganancia" value="{{ $productos + $ganancia }}" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Fecha</label>
                <input type="text" readonly name="fecha" value="{{ date('Y-m-d H:i:s') }}" class="form-control">
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-ms btn-success btn-block" value="Realizar Cierre">
          <input type="hidden" name="cantidad_cortes" class="btn btn-ms btn-success btn-block" value="{{ $cantidad_cortes }}">
          <input type="hidden" name="barber_id" class="btn btn-ms btn-success btn-block" value="{{ auth()->user()->barber_id }}">
      </form>
        <hr>
        <h5 class="card-title"><u>Cierres</u></h5>

        <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
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
                <th>Accion</th>
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
                <td>
                    <form id="form" action="{{ route('cierre.destroy',$cierres->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-danger btn-block" value="Eliminar">
                    </form>
                </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        </div>


    </div>
</div>
@endsection
