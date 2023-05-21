<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

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
      $consulta = "INSERT INTO unidadejer (factores, tipo) VALUES ('$Pro', '1')";
      mysqli_query($conexion, $consulta);
    }
  }
}
?><br>
<center>
  <div>
    <a class="btn btn-success" href="./agergarFactores2.php">Grado del Factor a ser Medido
      <i class="fa fa-plus"></i> </a>
  </div>
</center>
<br><br>
<div class="container">
  <table class="table table-bordered table-dark table-striped">
    <thead class="thead-dark">
      <tr>
        <th>
          <center>Presencia o Ausencia</center>
        </th>
      </tr>
    </thead>
  </table>
</div>
<div class="input-group input-group-sm mb-3">
  <form id="form1" name="form1" method="post">
    N. de Factores a Registrar:
    <input name="cantidad" type="number" min="1" id="cantidad" value="<?php echo $cantidad; ?>" />
    <input type="submit" name="submit" value="Ok" />
  </form>
</div>

<?php if ($cantidad > 0) { ?>
  <form method="POST">
    <div class="container">
      <table width="auto" border="0" class="table table-responsive-sm table-bordered table-dark table-striped">
        <thead class="thead-dark">
          <tr>
            <td>No.</td>
            <td>Factores:</td>
          </tr>
          <?php for ($i = 1; $i <= $cantidad; $i++) { ?>
            <tr>
              <td>
                <?php echo $i; ?>
              </td>
              <td><input type="text" name="producto<?php echo $i; ?>" required="required"></td>
              <input name="num<?php echo $i; ?>" type="hidden">
              <input name="cantidad" type="hidden" value="<?php echo $cantidad; ?>" />
            </tr>
          <?php } ?>
        </thead>
      </table>
      <button type="submit" name="submit">Guardar</button>
    </div>
  </form>
<?php } ?>

<br><br><br><br>