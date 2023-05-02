<?php
$conexion = mysqli_connect("localhost", "root", "", "CMIE");

if (isset($_POST['registrar_factor'])) {
  if (strlen($_POST['factores']) >= 1) {

    $consulta2 = "SELECT unidadejer.id_factores FROM unidadejer JOIN user ON user.id_unidad = unidadejer.id_factores";
    $resultado = mysqli_query($conexion, $consulta2);
    $fila = mysqli_fetch_assoc($resultado);

    $factores = trim($_POST['factores']);
    $consulta = "INSERT INTO unidadejer (id_unidad, factores, nota, id_factores)
    VALUES ('', '$factores', NULL, 'echo $fila[id_factores]' ";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header('Location: ../vista_admin/factor_medicion.php');
  }
}
?>