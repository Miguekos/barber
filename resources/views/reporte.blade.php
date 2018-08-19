@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
      <h1>Rerpote</h1>


        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Servicio</th>
              <th>Precio</th>
            </tr>
          </thead>
          @foreach($report as $reports)
          <tbody>
            <tr>
              <td>{{ $reports->id }}</td>
              <td>{{ $reports->motivo }}</td>
              <td>{{ $reports->valor }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td>Total</td>
              <td>{{ $suma }}</td>
              <td>Pago al barbero {{ $por_pagar }}</td>
            </tr>
          </tfoot>
        </table>
    </div>
</div>

@endsection
