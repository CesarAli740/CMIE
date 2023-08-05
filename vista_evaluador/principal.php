<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}
$id_unidad = $_SESSION['unidad'];
$id_division = $_SESSION['division'];
$id = $_SESSION['id']; ?>

<link rel="stylesheet" href="../css/es.css">

<?php include '../header.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Página</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap');

  :root {
    font-family: 'Roboto', sans-serif;
  }

  /* Estilos para los botones */
  .boton {
    background-color: #1B9C85;
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

  .titulo {
    border-radius: 5px;
    margin: 3%;
    padding: 1px;
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

<form action="../includes/_functions.php" method="POST">

  <div class="container">
    <center> <input type="hidden" id="gunidad" name="gunidad" value="<?php echo $nombre_gunidad; ?>">
      <br>

      <label for="division">División:</label><br>
      <select class="form-select" id="division" name="division" disabled>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
        $SQL = "SELECT * FROM division WHERE id = '$id_division';";
        $dato = mysqli_query($conexion, $SQL);
        if ($dato->num_rows > 0) {
          while ($fila = mysqli_fetch_array($dato)) {
            ?>
            <option value="">
              <?php echo $fila['nombre']; ?>
            </option>
            <?php
          }
        } else {
          ?>
          <option value="">No Existen Registros</option>
          <?php
        }
        ?>
      </select>
      <br>


      <label for="unidad">Selecciona una Unidad:</label><br>
      <select class="form-select" id="unidad" name="unidad">
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
        $SQL = "SELECT * FROM unidad WHERE division = '$id_division';";
        $dato = mysqli_query($conexion, $SQL);
        if ($dato->num_rows > 0) {
          while ($fila = mysqli_fetch_array($dato)) {
            ?>
            <option value="<?php echo $fila['id']?>">
              <?php echo $fila['nombre']; ?>
            </option>
            <?php
          }
        } else {
          ?>
          <option value="">No Existen Registros</option>
          <?php
        }
        ?>
      </select>
    </center>
  </div>
  <div class="titulo">
    <h1 class="display-4">Sistema Estratégico para Determinar la Eficiencia Combativa</h1>
  </div>
  <div class="botones">

    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="accion" value="editar_registro2">
    <button class="boton" name="evaluar" onClick="window.location.href='./evaluar.php';"><strong>Evaluar</strong></button>
    <button class="boton" name="coeficiente"
      onClick="window.location.href='./coeficiente_de_efectividad.php';"><strong>Nota Final</strong></button>
</form>



</body>

</html>