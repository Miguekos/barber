<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

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
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM servicios WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// </tr>";
while($row = mysqli_fetch_array($result)) {
  $precio = $row['precio'];
  $motivo = $row['nombre'];


  echo "
  <label for=''>Precio</label>
  <input type='number' id='precio' step='any' name='precio' value='$precio' class='form-control'>
  <input type='hidden' name='motivo' value='$motivo' class='form-control'>
  ";
    // echo "<tr>";
    // echo "<td>" . $row['nombre'] . "</td>";
    // echo "<td>" . $row['precio'] . "</td>";
    // echo "<td>" . $row['descripcion'] . "</td>";
    // echo "</tr>";
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
