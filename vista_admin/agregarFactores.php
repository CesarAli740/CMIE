
<?php 
$conexion= mysqli_connect("localhost", "root", "", "CMIE");


if (isset($_POST['cantidad'])) {
  $cantidad = (int) $_POST['cantidad'];
} else {
  $cantidad = 1;
}

$factoress = array();

for ($i = 1; $i <= $cantidad; $i++) {
  if (isset($_POST["factores$i"])) {
    $factores = $_POST["factores$i"];
    $factoress[] = array('factores' => $factores);
  }
}

if (!empty($factoress)) {
  foreach ($factoress as $factores) {
    $fac = $factores['factores'];
    $consulta = "INSERT INTO unidadejer (factores) VALUES ('$fac')";
    mysqli_query($conexion, $consulta);
  }
}
?>

<form id="form1" name="form1" method="post">
  <label for="cantidad">N. de factores a Registrar:</label>
  <input name="cantidad" type="number" min="1" id="cantidad" value="<?php echo $cantidad; ?>" />
  <button type="submit" name="submit">Ok</button>
</form>

<?php if ($cantidad > 0): ?>
  <form method="POST">
    <table width="auto" border="0">
      
      <tr>
        <td>No.</td>
        <td>Nombre factores:</td>
      </tr>
      <?php for ($i = 1; $i <= $cantidad; $i++): ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><input type="text" name="factores<?php echo $i; ?>" required="required"></td>
          <input name="num<?php echo $i; ?>" type="hidden">
        </tr>
      <?php endfor; ?>
      <tr>
        <td colspan="3" align="right">
          <button type ="submit" name="submit" >Guardar</button>
        </td>
      </tr>
    </table>
  </form>
<?php endif; ?>


<br><br><br><br><br><br><br>



