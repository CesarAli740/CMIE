<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$uni = $_SESSION['unidad'];
$div = $_SESSION['division'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}


?>
<?php include '../header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
    integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
    crossorigin="anonymous"></script>

  <title>Cambiar</title>
</head>

<body>

  <div class="container is-fluid">
    <div class="col-xs-12"><br>
      <style>
        div.mision-dimension {
          display: flex;
          justify-content: space-evenly;
        }
      </style>
      <br>
      </form>
      <table class=" table table-responsive-sm table-striped table-active " id="table_id">
        <thead>
          <tr>

            <col style="width:30%;" />
            <col style="width:30%;" />
            <col style="width:30%;" />
            <col style="width:10%;" />

            <th scope="col">Mision del Ejercito</th>
            <th scope="col">Mision Division</th> <!-- FFAA -->
            <th scope="col">Mision Unidad</th>
            <th scope="col">Actualizar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conexion = mysqli_connect("localhost", "root", "", "CMIE");
          $SQL = "SELECT mision.id, mision.misionejer FROM mision";
          $dato = mysqli_query($conexion, $SQL);

          if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {
              ?>
              <tr>
                <td>
                  <?php echo $fila['misionejer']; ?>
                </td>
                <?php

                $divisionQuery = "SELECT * FROM division WHERE division.id = '$div';";
                $divisionResult = mysqli_query($conexion, $divisionQuery);
                if ($divisionResult->num_rows > 0) {
                  while ($divisionFila = mysqli_fetch_array($divisionResult)) {
                    ?>
                    <td>
                      <?php echo $divisionFila['mision_division']; ?>
                    </td>
                    <?php
                  }
                }

                $unidadQuery = "SELECT * FROM unidad WHERE unidad.id = '$uni';";
                $unidadResult = mysqli_query($conexion, $unidadQuery);
                if ($unidadResult->num_rows > 0) {
                  while ($unidadFila = mysqli_fetch_array($unidadResult)) {
                    ?>
                    <td>
                      <?php echo $unidadFila['mision_unidad']; ?>
                    </td>
                    <td>
                      <a class="btn btn-warning" href="./editar_mision.php?uni=<?php echo $uni; ?>&div=<?php echo $div; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }
                } else {
                  ?>
                <td colspan="16">No existen registros</td>
                </tr>
                <?php
                }
            }
          }
          ?>
         
</body>
</table>

</html>