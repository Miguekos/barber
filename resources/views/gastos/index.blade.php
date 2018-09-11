@extends('layouts.app')

@section('content')

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <section class="content-header" style="padding-bottom: 10px;">
        <h1>
            Gastos Varios
        </h1>
    </section>
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <form action="{{ route('gastos.store') }}" id="insertarCaja" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group col-lg-4">
                        </div>
                        <!-- accion -->
                        <div class="row col-sm-12 text-center">
                            <div class="form-group col-sm-4">
                                <!-- Izquierda -->
                            </div>

                            <div class="form-group text-center col-sm-4">
                                <label>Accion</label>

                                <select autofocus class="form-control text-center" required name="accion">
                                    <option value="0">-- SELECIONE ACCION --</option>
                                    <option value="deposito">Deposito</option>
                                    <option value="retiro">Retiro</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <!-- Derecha -->
                            </div>
                        </div>

                        <br>
                        <br>

                        <!-- Monto -->
                        <div class="row col-sm-12 text-center">
                            <div class="form-group col-sm-4">
                                <!-- Izquierda -->
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Monto</label>
                                <input type="number" required class="form-control" name="gastos">
                            </div>

                            <div class="form-group col-sm-4">
                                <!-- Derecha -->
                            </div>
                        </div>

                        <!-- Motivo -->
                        <div class="row col-sm-12 text-center">
                            <label>Motivo</label>
                        </div>
                        <div class="row text-center">
                            <div class="form-group col-sm-3 text-center">
                                <!-- Izquierda -->
                            </div>

                            <div class="form-group col-sm-6 text-center	">

                                <textarea class="form-control" required rows="4" cols="50" name="motivo"></textarea>

                            </div>

                            <div class="form-group col-sm-3">
                                <!-- Derecha -->
                            </div>
                        </div>

                        <div class="text-center form-group col-lg-12">
                            <input type="hidden" name="barber_id" value="{{ auth()->user()->barber_id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">
                            <input type="submit" class="btn sombra btn-info" value="Guardar">
                        </div>
                    </form>

                    <div class="row col-sm-12">

                        <table class="table datatable table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Catidad</th>
                                <th>Accion</th>
                                <th>Motivo</th>
                                <th>Fecha</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gastos as $gasto)
                                <tr>
                                <td>{{ $gasto->id }}</td>
                                <td>{{ $gasto->gastos }}</td>
                                <td>{{ $gasto->accion }}</td>
                                <td>{{ $gasto->motivo }}</td>
                                <td>{{ $gasto->created_at }}</td>
                                <td><a class='btn btn-sm btn-danger' onclick='return Confirmation()' href='./?action=eliminar2&bd=".'gastos'."&id=".$rowX['id']."'>Eliminar</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</section>

<script type="text/javascript">
    function Confirmation() {

        if (confirm('Esta seguro de eliminar el registro?')==true) {
            // alert('El registro ha sido eliminado correctamente!!!');
            return true;
        }else{
            //alert('Cancelo la eliminacion');
            return false;
        }
    }
</script>


@endsection