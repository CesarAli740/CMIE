<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

	header("Location: ../includes/login.php");
	die();

}


?>
<!DOCTYPE html>
<html lang="en">

<?php include '../header.php'; ?><br>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<title>Usuarios</title>
</head>

<style>
	body {
		background-image: url('../img/FondoMulti.svg');
	}
</style>

<!DOCTYPE html>
<html>

<head>
	<title>Tabla en PHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.table {
			margin: 0 20px;
		}
	</style>
</head>

<body>


	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">
			<thead class="thead-dark">

				<tr>
					<th>
						<center>VALORACION DE CUALIDAD</center>
					</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">
			<thead class="thead-dark">

				<tr>
					<th>
						<center>GRADO DEL VALOR A SER MEDIDO</center>
					</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">
			<thead class="thead-dark">
				<tr>
					<th>
						<center>(CANTIDAD)</center>
					</th>
					<th>
						<center>(GRADO)</center>
					</th>
					<th>
						<center>(DISPERSION)</center>
					</th>
					<th>
						<center>(ARTICULACION)</center>
					</th>
					<th>
						<center>(CONTROL)</center>
					</th>
					<th>
						<center>(DISPONIBILIDAD)</center>
					</th>
					<th>
						<center>(OPORTUNIDAD)</center>
					</th>
				</tr>
			</thead>



			<tbody>
				<?php
				// Datos de ejemplo para la tabla
				$datos = array(
					array("DENOM. | VALOR", "DENOM. | VALOR", "DENOM. | VALOR", "DENOM. | VALOR", "DENOM. | VALOR", "DENOM. | VALOR", "DENOM. | VALOR"),
					array(
						"TOTAL → 100",
						"MAXIMO → 100",
						"IDEAL → 100",
						"IDEAL → 100",
						"TOTAL → 100",
						"TOTAL → 100",
						"IDEAL → 100",
					),
					array(
						"MAYOR → 75",
						"MAYOR → 75",
						"MAYOR → 75",
						"MAYOR → 75",
						"MAYOR → 75",
						"MAYOR → 75",
						"MAYOR → 75",
					),
					array(
						"MEDIA → 50",
						"MEDIA → 50",
						"MEDIA → 50",
						"MEDIA → 50",
						"MEDIA → 50",
						"MEDIA → 50",
						"MEDIA → 50",
					),
					array(
						"BAJA → 25",
						"BAJA → 25",
						"BAJA → 25",
						"BAJA → 25",
						"BAJA → 25",
						"BAJA → 25",
						"BAJA → 25",
					),
					array(
						"NULA → 0",
						"NULA → 0",
						"NULA → 0",
						"NULA → 0",
						"NULA → 0",
						"NULA → 0",
						"NULA → 0",
					),
				);

				// Generar la tabla
				foreach ($datos as $fila) {
					echo "<tr>";
					foreach ($fila as $celda) {
						echo "<td>$celda</td>";
					}
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div><br><br>

	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">
			<thead class="thead-dark">

				<tr>
					<th>
						<center>VALORACION DE CUALIDAD</center>
					</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">
			<thead class="thead-dark">

				<tr>
					<th>
						<center>PRESENCIA O AUSENCIA </center>
					</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="container">
		<table class="table table-responsive-sm table-bordered table-dark table-striped">

			<tbody>
				<?php
				// Datos de ejemplo para la tabla
				$datos = array(
					array("DENOM.", "VALOR"),
					array("AUSENCIA - TIENE (NO SE EJECUTO)", "0"),
					array("PRESENCIA - NO TIENE (SE EJECUTO)", "100"),
				);

				// Generar la tabla
				foreach ($datos as $fila) {
					echo "<tr>";
					foreach ($fila as $celda) {
						echo "<td>$celda</td>";
					}
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<br><br><br>
</body>

</html>