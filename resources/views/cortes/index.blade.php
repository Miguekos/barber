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
                      <select class="form-control" id="motivo_id" name="motivo_id" onchange="showService(this.value)">
                        <option value="0">-- SELECCIONE UN SERVICIO --</option>
                        @foreach($servicios as $servicio)
                          <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                        @endforeach
                      </select>
                      </form>
                  </div>
                  {{--<div>--}}
                    {{--<div id="precio_servicio"></div>--}}
                  {{--</div>--}}
                  <label for=''>Precio</label>
                  <input type="number" step="any" id='precio_servicio' name='precio' class='form-control'>
                  <input type='hidden' id='motivo' name='motivo' class='form-control'>
                  <div>
                      <label for="">Descuento S./</label>
                      <input type="number" step="any" id="descuento" name="descuento"  class="form-control">
                  </div>

                  <div>
                      <label for="">Metodo de Pago</label>
                      <select name="meto_pago" class="form-control" id="meto_pago">
                          <option value="Efectivo">Ejectivo</option>
                          <option value="Tarjeta">Tarjeta</option>
                      </select>
                  </div>

                  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
                  <input type="hidden" name="barber_id" value="{{ $user->barber_id }}" class="form-control">
                  <input type="hidden" name="porcent" value="{{ $user->porcent }}" class="form-control">
                  <input type="hidden" name="activo" value="1" class="form-control">

                  <br>
                  <div>
                      <input type="submit" class="btn btn-sm btn-success btn-block" value="Guardar">
                  </div>
              </div>
          </form>
          <hr>
          <h2 class="text-center panel-heading">Control de Servicios</h2>
          <hr>
          <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Servicio</th>
                      <th>Valor</th>
                      <th>Descuento</th>
                      <th>Total</th>
                      <th>Meth. de Pago</th>
                      <th>Fecha</th>
                      <th class="text-center">Accion</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($datos as $dato)
                  <tr>
                      <td>{{ $dato->id }}</td>
                      <td>{{ $dato->motivo }}</td>
                      <td>{{ $dato->precio }}</td>
                      <td>{{ $dato->descuento }}</td>
                      <td>{{ $dato->valor }}</td>
                      <td>{{ $dato->meto_pago }}</td>
                      <td>{{ $dato->created_at->Format('d-m-Y H:i') }}</td>
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
                      <td></td>
                      <td></td>
                    <td><b><u>{{ $suma }}</b> ./s</u></td>
                    <td></td>
                  </tr>
              </tfoot>
          </table>
          </div>

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
//              if (str == "") {
//                  document.getElementById("precio_servicio").innerHTML = "";
//                  return;
//              } else {
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          var json = JSON.parse(this.responseText);
                          document.getElementById("motivo").value = json.nombre;
                          document.getElementById("precio_servicio").value = json.precio;
//                          console.log(json);
                          console.log(json.nombre);
                          console.log(json.precio);
                      }
                  };
                  xmlhttp.open("GET","/getservice/"+str,true);
                  xmlhttp.send();
//              }
          }
          </script>

          <script type="text/javascript">
            function calcular(){
              var num1 = document.getElementById("descuento").value;
              var num2 = document.getElementById("precio").value;
              var valor1 = num1 / 100;
              var valor2 = valor1 * num2;
              var total_a_pagar = parseFloat(valor2) + parseFloat(num1);
              document.getElementById("valor").value = total_a_pagar;
              console.log("valor1: " + valor1);
              console.log("Num1: " + num1);
              console.log("Num2: " + num2);
            };
            function pago_por_dia(){
              var num3 = document.getElementById("total").value;
              var num4 = document.getElementById("dias").value;
              var total_dias = parseFloat(num3) / parseFloat(num4);
              // console.log("Total Dias: " + total_dias);
              document.getElementById("totaldias").value = total_dias.toFixed(2);
            };
            </script>
@endsection
