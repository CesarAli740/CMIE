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

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}


if (isset($_POST['subir_nota'])) {
  extract($_POST);
  for ($x = 1; $x <= 6; $x++) {
    if ($x == 1) {
      $consulta2 = "UPDATE notas_finales SET 
    personal=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
      mysqli_query($conexion, $consulta2);
    } else
      if ($x == 2) {
        $consulta2 = "UPDATE notas_finales SET 
    inteligencia=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
        mysqli_query($conexion, $consulta2);
      } else
        if ($x == 3) {
          $consulta2 = "UPDATE notas_finales SET 
    operaciones=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
          mysqli_query($conexion, $consulta2);
        } else
          if ($x == 4) {
            $consulta2 = "UPDATE notas_finales SET 
    logistica=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
            mysqli_query($conexion, $consulta2);
          } else
            if ($x == 5) {
              $consulta2 = "UPDATE notas_finales SET 
    accion_civica=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
              mysqli_query($conexion, $consulta2);
            } else
              if ($x == 6) {
                $consulta2 = "UPDATE notas_finales SET 
    derechos_humanos=(SELECT AVG($conc) FROM notas_factores WHERE notas_factores.tipo = $x) WHERE notas_finales.id_unidad = " . $id_unidad . ";";
                mysqli_query($conexion, $consulta2);
              }

  }
  mysqli_close($conexion);

  if ($rol == 1) {
    header('Location: ../vista_admin/factor_admin.php');
  } else if ($rol == 2) {
    header('Location: ../vista_evaluador/coeficiente_de_efectividad.php');
  }
}


?>