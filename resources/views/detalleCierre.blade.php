@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
      <form class="" action="{{ route('barberosCierre.store') }}" method="post">
          {{ csrf_field() }}
          <h1>Rerporte de {{ $nombre_cierre }}</h1>
          <hr>
          <div class="row">
              <div class="col-md-1">
                  <label for="">Efectivo</label>
                  <input type="text" readonly name="efectivo" value="{{ $efectivo }}" class="form-control">
              </div>
              <div class="col-md-1">
                  <label for="">Visa</label>
                  <input type="text" readonly name="tarjeta" value="{{ $tarjeta }}" class="form-control">
              </div>
              <div class="col-md-2">
                  <label for="">Recaudado</label>
                  <input type="text" readonly name="recaudado" value="{{ $suma }}" class="form-control">
              </div>
              <div class="col-md-2">
                  <label for="">Pago del barbero</label>
                  <input type="text" readonly name="por_pagar" value="{{ $por_pagar }}" class="form-control">
              </div>
              <div class="col-md-2">
                  <label for="">Ganancia de la tienda</label>
                  <input type="text" readonly name="ganancia" value="{{ $suma - $por_pagar }}" class="form-control">
              </div>
              <div class="col-md-2">
                  <label for="">Cantidad de Cortes</label>
                  <input type="text" readonly name="cantidad_cortes" value="{{ $cantidad_cortes}}" class="form-control">
              </div>

                  <input type="hidden" readonly name="barbero" value="{{ $nombre_cierre }}" class="form-control">

              <div class="col-md-2">
                  <input type="hidden" readonly name="barbero_id" value="{{ $barbero_id }}" class="form-control">
                  <input type="hidden" readonly name="barber_id" value="{{ $barber_id }}" class="form-control">
                  <label for="">Fecha</label>
                  <input type="text" readonly name="fecha" value="{{ date('Y-m-d H:i:s') }}" class="form-control">
                  <input type="hidden" name="activo" value="1" class="form-control">
              </div>
          </div>
          <hr>
          <input type="submit" class="btn btn-ms btn-success" value="Cerrar">
          <hr>
      </form>
      <h3>Detalle</h3>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cant. Cortes</th>
                    <th>Efectivo</th>
                    <th>Tarjeta</th>
                    <th>Recaudado</th>
                    <th>Por pagar</th>
                    <th>Ganancia tienda</th>
                    <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
              @foreach($detalle as $detalles)
                <tr>
                    <td>{{ $detalles->id }}</td>
                    <td>{{ $detalles->barbero }}</td>
                    <td>{{ $detalles->cantidad_cortes }}</td>
                    <td>{{ $detalles->efectivo }}</td>
                    <td>{{ $detalles->tarjeta }}</td>
                    <td>{{ $detalles->recaudado }}</td>
                    <td>{{ $detalles->por_pagar }}</td>
                    <td>{{ $detalles->ganancia }}</td>
                    <td>{{ $detalles->created_at }}</td>
                </tr>
              @endforeach
              </tbody>
          </table>

      </div>
    </div>
</div>
@endsection
