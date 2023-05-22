<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}
$id_unidad = $_SESSION['id_unidad'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Página</title>
	<link rel="stylesheet" type="text/css" href="./principal.css">
</head>

<?php include '../header.php'; ?>

<style>
    body {
      background-image: url('../img/FondoMulti.svg');
    }
    a{
      text-decoration: none;
    }
  </style>
<body>
        <div class="titulo">
            <h1 class="display-4" >Normas y Procedimientos para la Ejecucion del Control a la Gestión Estrategica</h1></div>
        <div class="botones">
          
          <button class="boton" onClick="window.location.href='./cuadro_de_mando.php';">Cuadro de Mando de Control</button>
          <button class="boton" onClick="window.location.href='./factor_medicion.php';">Factores de Medición</button>
          <button class="boton" onClick="window.location.href='./valores.php';">Valores para el Grado del Factor a ser Medido</button>
          <button class="boton" onClick="window.location.href='./coeficiente_de_efectividad.php';">Coeficiente de Efectividad</button>
        </div>
</body>
</html>

