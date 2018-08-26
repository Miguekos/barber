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
              <label for="">Cortes</label>
                <input type="text" readonly value="{{ $corte }} ./s" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Productos</label>
                <input type="text" readonly value="" placeholder="en construccion" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Pagos a Personal</label>
                <input type="text" readonly value="" placeholder="en construccion" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Ganancia</label>
                <input type="text" readonly value="{{ date('y') }} ./s" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Total</label>
                <input type="text" readonly value="{{ date('y') }} ./s" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="">Fecha</label>
                <input type="text" readonly value="{{ date('d-m-Y H:m') }}" class="form-control">
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-ms btn-success btn-block" value="Realizar Cierre">
        <hr>
        <h5 class="card-title"><u>Cierres</u></h5>

        <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Cortes</th>
              <th>Prodcutos</th>
              <th>Gastos Varios</th>
              <th>Ganancia</th>
              <th>Total</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>1</td>
            </tr>
          </tbody>
        </table>
        </div>

      </form>
    </div>
</div>
@endsection
