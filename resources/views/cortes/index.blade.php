@extends('layouts.app')

@section('content')
<h1 class="panel-heading">Cortes</h1>
<div class="card">
    <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <form action="{{ route('corte.store') }}" method="post">
          {{ csrf_field() }}
              <div class="col-md-12 form-group">
                  <div>
                      <label for="">Tipo de Servicio</label>
                      <input type="text" step="any" name="motivo" autofocus class="form-control col-md-12">
                  </div>
                  <div>
                    <label for="">Monto a guardar</label>
                    <input type="number" step="any" name="valor" class="form-control">
                  </div>
                  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
                  <br>
                  <div>
                      <input type="submit" class="btn btn-sm btn-success btn-block" value="Guardar">
                  </div>
              </div>
          </form>
          <hr>
          <h2 class="text-center panel-heading">Control de Servicios</h2>
          <hr>
          <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Motivo</th>
                      <th>Valor</th>
                      <th class="text-center">Accion</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($datos as $dato)
                  <tr>
                      <td>{{ $dato->id }}</td>
                      <td>{{ $dato->motivo }}</td>
                      <td>{{ $dato->valor }}</td>
                      <td class="text-center">
                          <form id="form" action="{{ route('corte.destroy',$dato->id) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                          </form>
                          <input type="submit" onclick="myFunction()" class="btn btn-sm btn-danger" value="Eliminar">
                      </td>
                  </tr>
              @endforeach
              </tbody>
              <tfoot>
                  <tr>
                    <td><b><u>Total: </b></u></td>
                    <td></td>
                    <td><b><u>{{ $suma }}</b> ./s</u></td>
                    <td></td>
                  </tr>
              </tfoot>
          </table>
            </div>
        </div>
        <script>
        function myFunction() {
            var person = prompt("Contraseña: ");
            if (person == 'borrar') {
                // document.getElementById("demo").innerHTML =
                // "Hello " + person + "! How are you today?";
                document.getElementById('form').submit();
            }else{
                alert('Contraseña Incorrecta');
                // location.href="/home";
            }
        }
        </script>
@endsection
