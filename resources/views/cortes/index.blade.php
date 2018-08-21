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
                      <label for="motivo_id">Tipo de Servicio</label>
                      <form>
                      <select class="form-control" name="motivo_id" onchange="showService(this.value)">
                        <option value="0">-- SELECCIONE UN SERVICIO --</option>
                        @foreach($servicios as $servicio)
                          <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                        @endforeach
                      </select>
                      </form>
                  </div>
                  <div>
                    <label for="">Precio</label>
                    <div id="precio_servicio"></div>
                  </div>
                  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
                  <input type="hidden" name="barber_id" value="{{ $user->barber_id }}" class="form-control">
                  <input type="hidden" name="porcent" value="{{ $user->porcent }}" class="form-control">

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
                      <th>Servicio</th>
                      <th>Valor</th>
                      <th>Fecha</th>
                      <th class="text-center">Accion</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($datos as $dato)
                  <tr>
                      <td>{{ $dato->id }}</td>
                      <td>{{ $dato->motivo }}</td>
                      <td>{{ $dato->valor }}</td>
                      <td>{{ $dato->created_at->Format('d-m-Y H:m') }}</td>
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

          <hr>
          <h5>Total en servicios <small>{{ $suma }} ./s</small></h5>
          <h5>Ganacia <small>{{ (auth()->user()->porcent / 100) * $suma }} ./s</small></h5>
          <hr>

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

        <script>
          function showService(str) {
              if (str == "") {
                  document.getElementById("precio_servicio").innerHTML = "";
                  return;
              } else {
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("precio_servicio").innerHTML = this.responseText;
                      }
                  };
                  xmlhttp.open("GET","getservice.php?q="+str,true);
                  xmlhttp.send();
              }
          }
          </script>
@endsection
