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

<?php include '../header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Página</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap');
:root{font-family: 'Roboto', sans-serif;}
/* Estilos para los botones */
.boton {
  background-color: #4F494A;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
  font-family: 'Roboto', sans-serif;

}

.titulo{
  border-radius: 5px;
  margin: 7%;
  padding:1px;
  text-align: center;
}

/* Estilos para el contenedor de los botones */
.botones {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

/* Estilos para los botones en pantalla grande */
@media screen and (min-width: 600px) {
  .boton {
    width: 40%;
    margin: 20px;
  }
}

/* Estilos para los botones en pantalla pequeña */
@media screen and (max-width: 599px) {
  .boton {
    width: 80%;
  }
}

</style>

<body>
        <div class="titulo">
            <h1 class="display-4" >Sistema Estratégico para Determinar la Eficiencia Combativa</h1></div>
        <div class="botones">
          
          <!-- <button class="boton" onClick="window.location.href='./cuadro_de_mando.php';"><strong>Cuadro de Mando de Control</strong></button>
          <button class="boton" onClick="window.location.href='./factor_medicion.php';">Factores de Medición</button> Antiguo -->
          <button class="boton" onClick="window.location.href='./factor_admin.php';"><strong>Factores de Medición</strong></button>
          <!-- <button class="boton" onClick="window.location.href='./valores.php';"><strong>Valores para el Grado del Factor a ser Medido</strong></button> -->
          <button class="boton" onClick="window.location.href='./coeficiente_de_efectividad.php';"><strong>Coeficiente de Efectividad</strong></button>
        </div>
</body>
</html>

