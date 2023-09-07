<?php

$conexion = mysqli_connect("localhost", "root", "", "CMIE");
if (isset($_POST['registrar_factor'])) {
  if (strlen($_POST['factores']) >= 1) {
    $factores = trim($_POST['factores']);
    $id_factores = trim($_POST['id_factores']);
    $nota = trim($_POST['nota']);

    $consulta = "INSERT INTO unidadejer (id_unidad, factores, nota, id_factores)
    VALUES ('', '$factores', $nota, '$id_factores')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header('Location: ../vista_admin/factor_medicion.php');
  }
}

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];
$nombre_unidad = $_SESSION['unidad'];
$nombre_division = $_SESSION['division'];

if ($validar == null || $validar = '') {
  header("Location: ../includes/login.php");
  die();
}


if (isset($_POST['subir_nota_factor'])) {
  extract($_POST);

  $conc = 'c' . $id_unidad;

  $consulta = "UPDATE notas_factores SET 
    `$conc` = (SELECT AVG(`$conc`) FROM subfactor WHERE subfactor.tipo = '$id_factor') 
    WHERE notas_factores.id = $id_factor";

  mysqli_query($conexion, $consulta);

  if ($rol == 1) {
    header('Location: ../vista_admin/factor_admin.php');
  } else if ($rol == 2 or $rol == 3 or $rol == 4 or $rol == 5 or $rol == 6 or $rol == 7 or $rol == 8 or $rol == 9) {
    header('Location: ../vista_evaluador/evaluar_factores.php?id=' . $id_unidad);
  }
}

if (isset($_POST['subir_nota_dimension'])) {
  extract($_POST);

  $conc = 'c' . $id_unidad;

  $consulta = "UPDATE dimensiones SET 
    `$conc` = (SELECT AVG(`$conc`) FROM notas_factores WHERE notas_factores.tipo = '$id_dimension') 
    WHERE dimensiones.id = $id_dimension";

  mysqli_query($conexion, $consulta);

  $conc = 'c' . $id_unidad;
  $query = "SELECT ponderacion, $conc, ponderacion * $conc AS resultado FROM dimensiones";

  $resultado = mysqli_query($conexion, $query);
  $suma = 0;
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $suma += $fila['resultado'];
  }
  echo $suma;

  $consulta = "UPDATE unidad SET 
  nota = '$suma' WHERE unidad.id = $id_unidad";

  mysqli_query($conexion, $consulta);

  
  $query = "UPDATE user SET estado = 0 WHERE user.id = $id";
  mysqli_query($conexion, $query);


  if ($rol == 1) {
    header('Location: ../vista_admin/factor_admin.php');
  } else if ($rol == 2 or $rol == 3 or $rol == 4 or $rol == 5 or $rol == 6 or $rol == 7 or $rol == 8 or $rol == 9 or $rol == 10) {
    header('Location: ../vista_evaluador/coeficiente_de_efectividad.php?id='.$id_unidad);
  }
}


?>