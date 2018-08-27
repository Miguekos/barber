<style>
.tableta {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 3px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
<?php
$q = $_GET['q'];

$server = "127.0.0.1";
$name_db = "root";
$pass_db = "";
$db = "fitseven_ventasgym";

$con = new mysqli($server,$name_db,$pass_db,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}else{
    //echo "Conecto";
}
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM productos WHERE id = '".$q."' or nombre LIKE '%".$q."%' or categoria LIKE '%".$q."%' or marca LIKE '%".$q."%'";
$result = mysqli_query($con,$sql);

echo "<table class='table'>
<tr>
<th class=''>ID</th>
<th class=''>Categoria</th>
<th class=''>Nombre</th>
<th class=''>Marca</th>
<th class='text-center'>Cantidad</th>
<th class='text-center'>Peso</th>
<th class='text-center'>Precio</th>
</tr>";
$Cntbaja = "";
$j = 1;
while($row = mysqli_fetch_array($result)) {
    if ($row['cantidad'] == 0) {
        $disable = "";
        $enter5 = "agotado";
    }else{
        $disable = "agregarNombre";
        $enter5 = "enter5";
    }
    echo "<tr>";
    echo "<td class='' id='idP".$j."'>" . $row['id'] . "</td>";
    echo "<td class='' onclick='".$disable."(".$j."),".$enter5."();' id='categoria'>" . utf8_encode($row['categoria']) . "</td>";
    echo "<td class='' onclick='".$disable."(".$j."),".$enter5."();' id='nombre".$j."'>" . utf8_encode($row['nombre']) . "</td>";
    echo "<td class='' onclick='".$disable."(".$j."),".$enter5."();' id='marca".$j."'>" . utf8_encode($row['marca']) . "</td>";
    if ($row['cantidad'] <= 0) {
        $Cntbaja = "background-color: #d9534f; color: #fff;";
    }elseif ($row['cantidad'] <= 5) {
        $Cntbaja = "background-color: #e6a418; color: #fff;";
    }else {
        $Cntbaja = "";
    }
    echo "<td class='text-center' style='".$Cntbaja."' onclick='".$disable."(".$j."),".$enter5."();' id='cantidad".$j."'>" . $row['cantidad'] . "</td>";
    echo "<td class='text-center' onclick='".$disable."(".$j."),".$enter5."();' id='peso'>" . $row['peso'] . "</td>";
    echo "<td class='text-center' id='precio".$j."'>" . $row['precio'] . "</td>";
    echo "</tr>";
    $j = $j + 1;
}
echo "</table>";
mysqli_close($con);

?>
</body>
</html>
