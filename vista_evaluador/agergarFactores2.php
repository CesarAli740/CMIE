<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];

if ($validar == null || $validar = '') {
  header("Location: ../includes/login.php");
  die();
}

?>
<?php include '../header.php'; ?>
<?php

$conexion = mysqli_connect("localhost", "root", "", "CMIE");

if (isset($_POST['cant'])) {
  $cant = (int) $_POST['cant'];
} else {
  $cant = 1;
}

if (isset($_POST['submit'])) {
  for ($j = 1; $j <= $cant; $j++) {
    if (isset($_POST["prod" . $j])) {
      $nombre = $_POST["prod" . $j];
      $consulta2 = "INSERT INTO unidadejer (factores, id_factores, tipo, rol) VALUES ('$nombre', '$unidad', '2', '$rol')";
      mysqli_query($conexion, $consulta2);
    }
  }
}
?><br>

<center>
  <div>
    <a class="boton" href="./factor_medicion.php">Volver
      <i class="fa fa-plus"></i> </a>
  </div>
</center>
<br><br>
<div class="container">
  <table class="table table-bordered table-active table-striped">
    <thead class="thead-active">
      <tr>
        <th>
          <center>Grado del Factor a ser Medido</center>
        </th>
      </tr>
      <tr>
        <td>
          <style>
            input.tabla2 {
              width: 100%;
              background-color: transparent;
              border-top-style: hidden;
              border-right-style: hidden;
              border-left-style: hidden;
              color: black;

            }
          </style>
          <style>
            input.input {
              width: 5%;
              background-color: transparent;
              color: black;
              border-top-style: hidden;
              border-right-style: hidden;
              border-left-style: hidden;
            }
          </style>
          <form id="form2" name="form2" method="post">
            N. de Factores a Registrar: &nbsp;
            <input class="input" name="cant" type="number" min="1" id="cant" value="<?php echo $cant; ?>" />
            &nbsp;
            <input type="submit" name="submit" value="Ok" class="boton" placeholder="Ingrese el Factor Aquí" />
          </form>
        </td>
      </tr>
    </thead>
  </table>
</div>

<?php if ($cant > 0) { ?>
  <form method="POST">
    <div class="container">
      <table width="auto" border="0" class="table table-responsive-sm table-bordered table-active table-striped">
        <thead class="thead-active">
          <tr>
            <style>
              td.angosta {
                width: 7%;
                text-align: center;
              }
            </style>
            <td class="angosta">No.</td>
            <td>Factores:</td>
          </tr>
          <?php for ($j = 1; $j <= $cant; $j++) { ?>
            <tr>
              <td class="angosta">
                <?php echo $j; ?>
              </td>
              <td><input class="tabla2" type="text" name="prod<?php echo $j; ?>" required="required"></td>
              <input name="num<?php echo $j; ?>" type="hidden">
              <input name="cant" type="hidden" value="<?php echo $cant; ?>" />
            </tr>
          <?php } ?>
        </thead>
      </table>
      <center>
        <button type="submit" name="submit" class="boton">Guardar</button>
      </center>
    </div>
  </form>
<?php } ?>