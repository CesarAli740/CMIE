<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];
$dimen = $_GET['id'];

if ($validar == null || $validar = '') {
  header("Location: ../includes/login.php");
  die();
}

?>
<?php include '../header.php'; ?>
<?php

$conexion = mysqli_connect("localhost", "root", "", "CMIE");


if (isset($_POST['cantidad'])) {
  $cantidad = (int) $_POST['cantidad'];
} else {
  $cantidad = 1;
}

if (isset($_POST['submit'])) {
  for ($x = 1; $x <= $cantidad; $x++) {
    if (isset($_POST["producto" . $x])) {
      $Pro = $_POST["producto" . $x];
      $consulta = "INSERT INTO subfactor (nombre, tipo) VALUES ('$Pro', '$dimen')";
      mysqli_query($conexion, $consulta);
    }
  }
  
}
?>
<br>
<div class="container">
  <table class="table table-bordered table-active table-striped">
    <thead class="thead-active">
      <tr>
        <th>
          <center>Factores</center>
        </th>
      </tr>
      <tr>
        <td>
          <style>
            input.tabla2 {
              width: 100%;
              background-color: transparent;
              color: black;
              border-top-style: hidden;
              border-right-style: hidden;
              border-left-style: hidden;
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
          <form id="form1" name="form1" method="post">
            N. de Factores a Registrar: &nbsp;
            <input class="input" name="cantidad" type="number" min="1" id="cantidad"
              value="<?php echo $cantidad; ?>" />&nbsp;
            <input type="submit" name="submit" value="Ok" class="boton" />
          </form>
        </td>
      </tr>
    </thead>
  </table>
</div>

<?php if ($cantidad > 0) { ?>
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
          <?php for ($i = 1; $i <= $cantidad; $i++) { ?>
            <tr>
              <td class="angosta">
                <?php echo $i; ?>
              </td>
              <td><input class="tabla2" type="text" name="producto<?php echo $i; ?>" required="required"></td>
              <input name="num<?php echo $i; ?>" type="hidden">
              <input name="cantidad" type="hidden" value="<?php echo $cantidad; ?>" />
            </tr>
          <?php } ?>
        </thead>
      </table>
      <center>
        <button type="submit" name="submit" class="boton">Guardar</button>
        <a href="./ver_subfactores.php?id=<?php echo $_GET['id'] ?>&id_dimen=<?php echo $_GET['id_dimen'] ?>" class="botonr">Volver</a>
      </center>
    </div>
  </form>
<?php } ?>

<br><br><br><br>