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
      $consulta2 = "INSERT INTO unidadejer (factores, tipo) VALUES ('$nombre', '2')";
      mysqli_query($conexion, $consulta2);
    }
  }
}
?>br

<center>
  <div>
    <a class="btn btn-success" href="./factor_medicion.php">Volver
      <i class="fa fa-plus"></i> </a>
  </div>
</center>
<br><br>
<div class="container">
		<table class="table table-bordered table-dark table-striped">
			<thead class="thead-dark">
				<tr>
					<th>
						<center>Grado del Factor a ser Medido</center>
					</th>
				</tr>
			</thead>
		</table>
	</div>
<div class="input-group input-group-sm mb-3">
<form id="form2" name="form2" method="post">
  N. de Factores a Registrar:
  <input name="cant" type="number" min="1" id="cant" value="<?php echo $cant; ?>" />
  <input type="submit" name="submit" value="Ok" />
</form>
</div>

<?php if ($cant > 0) { ?>
  <form method="POST">
		<div class="container">
    <table width="auto" border="0" class="table table-responsive-sm table-bordered table-dark table-striped">
    <thead class="thead-dark">  
    <tr>
        <td>No.</td>
        <td>Factores:</td>
      </tr>
      <?php for ($j = 1; $j <= $cant; $j++) { ?>
        <tr>
          <td><?php echo $j; ?></td>
          <td><input type="text" name="prod<?php echo $j; ?>" required="required"></td>
          <input name="num<?php echo $j; ?>" type="hidden">
          <input name="cant" type="hidden" value="<?php echo $cant; ?>" />
        </tr>
      <?php } ?>
    </thead>
    </table>
          <button type="submit" name="submit">Guardar</button>
      </div>
  </form>
<?php } ?>
