<!DOCTYPE html>
<html lang="es">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset="UTF-8"">
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Barber | Factura</title>

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="css\bootstrap.min.css">
  <script src="assets\libs\jquery\dist\jquery.min.js"></script>


    <style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        /* background-color: #f1f1f1; */
        background-color: #fff;
        margin: 10px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #bodyCaja {

        margin: 0 20% 0 20%;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        /* background-color: #f1f1f1; */
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        /* background-color: #f1f1f1; */
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 2px 2px 10px 2px #D0D0D0;
    }

    #h2Caja {
      /* text-decoration: underline; */
      /* font-style: italic; */
      /* font-weight: bold; */
      /* font-family: "Lucida Console", Monaco, monospace; */
      color: #000000;
    /* font-size: 12em; */
    /* font-weight: bold;
    font-family: Helvetica;
    text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 2px 5px rgba(0,0,0,.25), 0 5px 5px rgba(0,0,0,.2), 0 5px 5px rgba(0,0,0,.15);
    background-color: #f1f1f1; */
    }

    .sombra{
        box-shadow: 2px 2px 5px grey;
    }

    </style>

</head>
<style>
body {

}

div {
    /* color: white; */
    /* text-align: center; */
    /* background-color: lightblue; */
}

/* p {
    font-family: verdana;
    font-size: 20px;
} */

.centro{
	box-shadow: 4px 4px 10px grey;
    /* margin-left: 50%;
    margin-right: 50%; */
    text-align: center;
    //background-color: lightblue;
    margin-left: 27%;
	border: 1px solid black;
	border-radius: 6px ;
    margin-right: 27%;
}

table, td, th {
    /*border: 1px solid black;*/
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}

.text-center{
    text-align: center;

}

.pull-right{
    padding-right:5px;
    padding-left:0;
    text-align:right;
    border-right:5px solid #eee;
    border-left:0
}

</style>

<!-- <link rel="stylesheet" href="assest/css/bootstrap.min.css"> -->
<?php
echo "<body onload='enter4()'>";
//$server = "localhost";
//$name_db = "fitseven_miguel";
//$pass_db = "Alexkos12.";
//$db = "fitseven_barber";

$server = "127.0.0.1";
$name_db = "root";
$pass_db = "";
$db = "barber";

$con = new mysqli($server,$name_db,$pass_db,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}else{
    //echo "Conecto";
}
mysqli_select_db($con,"ajax_demo");

$factP = $_POST['Nfactura'];
$id_factura = "Select id_factura from ventas order by id_factura desc limit 1";
$resultF = mysqli_query($con,$id_factura);
$row = mysqli_fetch_array($resultF);
$fact = $row[0];
date_default_timezone_set('America/Lima');
$date = date("Y-m-d H:i:s");
if ($fact == $factP) {
        ?>
    <script>
    alert("Factura ya Existe");
    window.location.replace('index.php');
    </script>
    <?php
}else{
    echo "<form>";
    echo "<div onclick='enter4()' class='centro'>";
    echo "Barber Shop<br>";
    // echo "RUC 2000000000 Morelli 181 P-2 Lima <br>";
    // echo "Lima - San Borja <br>";
    echo "Boleta de venta Electronica <br>";
    // echo "BC19 - 00095376 <br>";
    echo "<br>";
    echo "<table class='table'>
      <tr>
		<th style='text-align: center; width:5%'>ID</th>
        <th style='text-align: center; width:5%'>Cant.</th>
        <th style='text-align: center; width:30%'>Categoria</th>
        <th style='text-align: center; width:45%'>Prodcuto</th>
		<th style='text-align: center; width:5%'>Marca</th>
        <th style='text-align: center; width:25%'>Precio</th>
      </tr>
      <tr>";

    // print_r($result);
    // $factura = $factura + 1:
    $nu4 = 0;
    for($x = 1; $x <= count($_POST['totalitem']); $x++) {

            $asd = $_POST['asd'.$x];
    		$sql = "SELECT * FROM productos WHERE id = '".$asd."'";
    		$result = mysqli_query($con,$sql);
    		// print_r($result);

    		while($row = mysqli_fetch_array($result)) {

    		$cantidad = $_POST['cantidad'.$x];

			$id = $row['id'];
            $categoria = $row['categoria'];
            $nombre = $row['nombre'];
			$marca = $row['marca'];
    		$nu1 = $row['precio'];
    		$nu2 = $cantidad;
    		$nu3 = $nu1 * $nu2;
            $nu4 += $nu3;


			echo "<td> " . $id . " </td>";
            echo "<td> " . $cantidad . " </td>";
            echo "<td> " . utf8_encode($categoria) . " </td>";
            echo "<td> " . utf8_encode($nombre) . " </td>";
			echo "<td> " . utf8_encode($marca) . " </td>";
            echo "<td> " . $nu3 . " S/</td>";
            echo "</tr>";


            $atendido = $_POST['atendido'];
            $id_user = $_POST['id_user'];
            //Guardan el la base de datos
            $guardar = "insert into ventas (id_factura, id_producto, nombre, categoria, cantidad, id_monto, total, estado, activo, hora, atendido, id_user) values ('$factP','$id','$nombre','$categoria','$nu2','$nu1','$nu3','1','1','$date','$atendido','$id_user')";
            //echo $guardar;
            $resultado = mysqli_query($con,$guardar);
            // print_r($resultado);

			$cActual = "SELECT * FROM productos WHERE id = '".$id."'";
			$result1 = mysqli_query($con,$cActual);
			while($rowC = mysqli_fetch_array($result1)){
				//echo "Cantidad Actual: ". $rowC['cantidad'] ." ";
				//echo "Cantidad Comprada: ". $cantidad . " <br>";
				$restarCantidad = $rowC['cantidad'] - $cantidad;
				//echo $restarCantidad;
//                $inserVenta = "insert into inventario (id_producto, venta, compra, fecha) values ('$id','$nu2','0','$date')";
//                $resultado = mysqli_query($con,$inserVenta);
//				$actuProducto = "update productos set cantidad = $restarCantidad where id = $id";
//				$resultado = mysqli_query($con,$actuProducto);
			}


    		}


    }
    $pagado = $_POST['pagado'];
    echo "</table>";
    echo "<br>";
    echo "<p class='pull-right'> Total: ". number_format($nu4, 2, '.', '') ." S/</p>";
    $devolver = $pagado - $nu4;
    echo "<p class=''><b><h2 class='text-left' style='padding-left: 1%; color: red;'> Devolver: ". number_format($devolver, 2, '.', '') ." S/</h2></b></p>";
    echo "</div>";






}


// echo "$pagado";

// echo "<button href='index2.php' style='border-top-width: 1px; margin-top: 10px;' class='centro btn btn-success'>Vender</button>";
echo "<p id='pago'></p>";
echo "<a onkeydown='enter4()' id='nuevaventa' class='btn btn-success text-center centro' href='/venta'> Nueva Venta</a>";
echo "</form>";
?>
</html>
<script>
function enter4(){
    //if (event.keyCode == 13)
    //{
      $('#nuevaventa').focus();
      // $('#monto').val('');
      // event.returnValue=false;
    //}
}
</script>
<!-- <script src="assest/js/jquery-1.12.4.js"></script> -->
