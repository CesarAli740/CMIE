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
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Página</title>
	<link rel="stylesheet" type="text/css" href="./principal.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
		integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
		crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>

		function actualizarValor(valor, factores2, unidad) {
			$.ajax({
				url: './actualizar.php',
				method: 'POST',
				data: { valor: valor, factores2: factores2, unidad: unidad },
				success: function (response) {
					console.log(response);
				},
				error: function (xhr, status, error) {
					console.error(error);
				}
			});
		}

		function actualizarValor2(valor, factores2, unidad) {
			$.ajax({
				url: './actualizar2.php',
				method: 'POST',
				data: { valor: valor, factores2: factores2, unidad: unidad },
				success: function (response) {
					console.log(response);
				},
				error: function (xhr, status, error) {
					console.error(error);
				}
			});
		}

	</script>
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
	<form action="../includes/validar_factor.php" method="POST">
		<br>
		<center>
			<div>
				<a class="btn btn-success" href="./agregarFactores.php">Nuevo Factor
					<i class="fa fa-plus"></i> </a>
			</div>
		</center>
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
				$SQL = "SELECT unidadejer.id_unidad, unidadejer.factores, unidadejer.nota, unidadejer.id_factores FROM unidadejer WHERE unidadejer.tipo = 1 AND unidadejer.rol = '$rol' AND unidadejer.id_factores = '$unidad';";
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
									<div class="form-group">
										<div class="container">
											<div class="row">
												<div class="col-6 col-md-4">
													<select class="selectpicker"
														onchange="actualizarValor2(this.value, '<?php echo $fila['factores']; ?>', <?php echo $unidad ?>)">
														<option value="0">-- Seleccionar --</option>
														<option value="0">NULA</option>
														<option value="100">TOTAL</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<a class="btn btn-warning"
										href="./editar_indicador.php?id=<?php echo $fila['id_unidad'] ?> ">
										<i class="fas fa-edit"></i> </a>
									<a class="btn btn-danger"
										href="./eliminar_indicador.php?id=<?php echo $fila['id_unidad'] ?>">
										<i class="fas fa-trash"></i></a>

									<!-- 
									<a class="btn btn-success" href="./crear_factor.php?id=<?php echo $fila['id_factores'] ?>">
										<i class="fas fa-plus"></i></a> -->
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
	</form>
</body>
</form>



<form action="../includes/validar_factor.php" method="POST">
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
			$SQL = "SELECT unidadejer.id_unidad, unidadejer.factores, unidadejer.nota, unidadejer.id_factores FROM unidadejer WHERE unidadejer.tipo = 2 AND unidadejer.rol = '$rol' AND unidadejer.id_factores = '$unidad';";
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
								<div class="form-group">
									<div class="container">
										<div class="row">
											<div class="col-6 col-md-4">
												<style>
													.selectpicker {
														appearance: none;
														-webkit-appearance: none;
														-moz-appearance: none;
														padding: 8px 38px 8px 10px;
														border: 1px solid transparent;
														border-radius: 4px;
														color: #ffffff;
														background-color: #212529;
														background-repeat: no-repeat;
														background-position: right center;
														cursor: pointer;
														font-size: 14px;
														width: auto;
													}

													.selectpicker::-ms-expand {
														display: none;
													}

													.selectpicker:focus {
														outline: none;
														border-color: #80bdff;
														box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
													}

													.selectpicker option {
														color: #212529;
														background-color: #ffffff;
													}
												</style>
												<select class="selectpicker"
													onchange="actualizarValor(this.value, '<?php echo $fila['factores']; ?>', <?php echo $unidad ?>)">
													<option value="0">-- Seleccionar --</option>
													<option value="0">NULA</option>
													<option value="25">BAJA</option>
													<option value="50">MEDIA</option>
													<option value="75">MAYOR</option>
													<option value="100">TOTAL</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td>
								<a class="btn btn-warning" href="./editar_indicador.php?id=<?php echo $fila['id_unidad'] ?> ">
									<i class="fas fa-edit"></i> </a>
								<a class="btn btn-danger" href="./eliminar_indicador.php?id=<?php echo $fila['id_unidad'] ?>">
									<i class="fas fa-trash"></i></a>
								<!-- <a class="btn btn-success" href="./crear_factor.php?id=<? //php echo $fila['id_factores'] ?>">
									<i class="fas fa-plus"></i></a> -->
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
	<center>
		<div class="mb-3">

			<input type="submit" value="Guardar" class="btn btn-success" name="subir_nota">
			<a href="./principal.php" class="btn btn-danger">Cancelar</a>

		</div>
	</center>
</form>
</body>
</form>