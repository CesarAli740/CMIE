<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "CMIE";

$conexion = mysqli_connect($host, $user, $password, $database);

if($conexion->connect_errno){
  echo "Falló la conexión a la base de datos " . $conexion->connect_error;
}
?>