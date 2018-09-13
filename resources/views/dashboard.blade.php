@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        @if(auth()->user()->rol == 'barbero')
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/dashboard">
                <!--<div class="box bg-cyan text-center">-->
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>-->
                    <h6 class="text-white">Escritorio</h6>
                </div>
              </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/corte">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Cortes</h6>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/ventas">
                <div class="box bg-cyan text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>-->
                    <h6 class="text-white">Ventas</h6>
                </div>
              </a>
            </div>
        </div>
        @endif
        @if(auth()->user()->rol == 'encargado' and auth()->user()->id != 1)
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/dashboard">
                <div class="box bg-cyan text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>-->
                    <h6 class="text-white">Escritorio</h6>
                </div>
              </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/corte">
                <div class="box bg-success text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>-->
                    <h6 class="text-white">Cortes</h6>
                </div>
                </a>
            </div>
        </div>
         <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/venta">
                <div class="box bg-warning text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>-->
                    <h6 class="text-white">Ventas</h6>
                </div>
              </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/producto">
                <div class="box bg-danger text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Producto</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/facturas">
                <div class="box bg-cyan text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>-->
                    <h6 class="text-white">Facturas</h6>
                </div>
              </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/corte">
                <div class="box bg-success text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>-->
                    <h6 class="text-white">Tipo de Corte</h6>
                </div>
                </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/barberos">
                <div class="box bg-warning text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>-->
                    <h6 class="text-white">Detalle Barbero</h6>
                </div>
              </a>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/cierre">
                <div class="box bg-danger text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Cierres</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <a href="/gastos">
                    <div class="box bg-danger text-center">
                        <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                        <h6 class="text-white">Gastos</h6>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if(auth()->user()->rol == 'encargado' and auth()->user()->id == 1)
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/">
                <div class="box bg-warning text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Escritorio</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/productosadmin">
                <div class="box bg-danger text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Productos</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/facturasadmin">
                <div class="box bg-info text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Facturas</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/servicio">
                <div class="box bg-success text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Tipos de Corte</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/barber">
                <div class="box bg-success text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Barberias</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/report">
                <div class="box bg-info text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Reporte Personal</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/reportshow">
                <div class="box bg-danger text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Reporte General</h6>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
              <a href="/user">
                <div class="box bg-warning text-center">
                    <!--<h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>-->
                    <h6 class="text-white">Usuarios</h6>
                </div>
              </a>
            </div>
        </div>
        @endif
        
    </div>

    <div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Detalle de: {{ auth()->user()->name }}</h5>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Correo</td>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                      <td>Rol</td>
                      <td>{{ auth()->user()->rol }}</td>
                    </tr>
                    <tr>
                      <td>Porncentaje</td>
                      <td>{{ auth()->user()->porcent }} %</td>
                    </tr>
                    <tr>
                      <td>Barberia</td>
                      <td>{{ auth()->user()->barber }}</td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
