<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Página</title>
	<link rel="stylesheet" type="text/css" href="./principal.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
		integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
		crossorigin="anonymous"></script>
</head>
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


	<body>
		<br>
    <div>
      <a class="btn btn-success" href="./agregarFactores.php">Nueva mision
      <i class="fa fa-plus"></i> </a>
    </div>
		<br><br>
		<div class="container">
			<table class="table table-bordered table-dark table-striped">
				<thead class="thead-dark">
					<tr>
						<th>
							<center>CUADRO DE MANDO INTEGRAL DEL EJERCITO</center>
						</th>
					</tr>
					<tr>
						<td>
							<center>
								<?php echo $_SESSION['nombre']; ?> - Editando PERSONAL
							</center>
						</td>
					</tr>
				</thead>
			</table>
		</div>
		<div class="container">

			<table class="table table-responsive-sm table-bordered table-dark table-striped">
				<thead class="thead-dark">
					<tr>
						<th>
							<center>Factores</center>
						</th>
						<th>
							<center>Nota
							</center>
						</th>
						<th>
							<center>Opciones</center>
						</th>
					</tr>
				</thead>
				<col style="width:60%;" />
				<col style="width:20%;" />
				<col style="width:15%;" />

				<?php

				$conexion = mysqli_connect("localhost", "root", "", "CMIE");
				$SQL = "SELECT unidadejer.id_unidad, unidadejer.factores, unidadejer.nota, unidadejer.id_factores FROM unidadejer ";
				$dato = mysqli_query($conexion, $SQL);

				if ($dato->num_rows > 0) {
					while ($fila = mysqli_fetch_array($dato)) {
						?>

						<tbody>
							<tr>
								<td>
									<?php echo $fila['factores']; ?>
								</td>
								<td>
									<h2><center><?php echo $fila['nota']; ?></center></h2>
									
								</td>
								<td>
									<a class="btn btn-warning"
										href="./editar_indicador.php?id=<?php echo $fila['id_unidad'] ?> ">
										<i class="fas fa-edit"></i> </a>
									<a class="btn btn-danger"
										href="./eliminar_indicador.php?id=<?php echo $fila['id_unidad'] ?>">
										<i class="fas fa-trash"></i></a>
									<a class="btn btn-success" href="./crear_factor.php?id=<?php echo $fila['id_factores'] ?>">
										<i class="fas fa-plus"></i></a>
								</td>
							</tr>
							<?php
					}
				} else {

					?>
						<tr class="text-center">
							<td colspan="16">No existen registros</td>
						</tr>
						<?php

				}

				?>
				</tbody>
			</table>
		</div>
	</body>
</form>