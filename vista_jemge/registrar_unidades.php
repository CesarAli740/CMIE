<?php
$divisionId = $_GET['divisionId'];
$conexion = mysqli_connect("localhost", "root", "", "CMIE");

if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$divisionId = mysqli_real_escape_string($conexion, $divisionId);

$query = "SELECT * FROM unidad WHERE division = '" . $divisionId . "'";

$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
  die("Error al obtener las unidades: " . mysqli_error($conexion));
}

$unidades = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
  $unidades[] = $fila;
}

mysqli_close($conexion);
header('Content-Type: application/json');

echo json_encode($unidades);

?>