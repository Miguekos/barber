<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Barber | Inicio</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../../assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('../../assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/extra-libs/multicheck/multicheck.css">
    <link href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('../../dist/css/style.min.css') }}" rel="stylesheet">
    <!-- <script src="../../assets/libs/toastr/build/toastr.min.js"></script>
    <link href="../../assets/libs/toastr/build/toastr.min.css" rel="stylesheet"> -->



</head>

<body>
  <!-- Con esto logro que si la persona no esta logueada no se cargaran los efectos ccs - js -->
  @guest

  @else
  <div id="main-wrapper">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->

    @include('templates.header')
    @include('templates.slidebar')
    <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">


          <div class="container-fluid">

            @endguest


            @if (session()->has('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>

            @elseif (session()->has('danger'))
                <div class="alert alert-info">
                    {{ session('danger') }}
                </div>

            @elseif (session()->has('flash'))
                <div class="alert alert-info">
                    {{ session('flash') }}
                </div>


            @endif
                @yield('content')


          </div>

@include('templates.footer')
        </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->

  </div>

  <script src="{{ asset('../../assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('../../assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('../../assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('../../assets/extra-libs/sparkline/sparkline.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('../../dist/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('../../dist/js/sidebarmenu.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{ asset('../../dist/js/custom.min.js') }}"></script>
  <!--This page JavaScript -->
  <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
  <!-- Charts js Files -->
  <script src="{{ asset('../../assets/libs/flot/excanvas.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot/jquery.flot.time.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot/jquery.flot.stack.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
  <script src="{{ asset('../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('../../dist/js/pages/chart/chart-page-init.js') }}"></script>


  <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
  <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
  <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>





<script type="text/javascript">
    $(document).ready(function(){
      $("#zero_config").DataTable({
      // "ordering":true,
      "order": [[ 0, "desc" ]],
      "language": {
          "sProcessing":    "Procesando...",
          "sLengthMenu":    "Mostrar _MENU_ registros",
          "sZeroRecords":   "No se encontraron resultados",
          "sEmptyTable":    "Ningún dato disponible en esta tabla",
          "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":   "",
          "sSearch":        "Buscar:",
          "sUrl":           "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":    "Último",
              "sNext":    "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      }
  });
});
</script>

<!-- <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script> -->

<script type="text/javascript">
    $(document).ready(function(){
      $("#example2").DataTable({
      // "ordering":true,
      "order": [[ 0, "desc" ]],
      "language": {
          "sProcessing":    "Procesando...",
          "sLengthMenu":    "Mostrar _MENU_ registros",
          "sZeroRecords":   "No se encontraron resultados",
          "sEmptyTable":    "Ningún dato disponible en esta tabla",
          "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":   "",
          "sSearch":        "Buscar:",
          "sUrl":           "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":    "Último",
              "sNext":    "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      }
  });
});
</script>

</body>

<!-- <script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script> -->

</html>
