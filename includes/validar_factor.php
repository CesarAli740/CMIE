<?php
$conexion = mysqli_connect("localhost", "root", "", "CMIE");
if (isset($_POST['registrar_factor'])) {
  if (strlen($_POST['factores']) >= 1 ) {
    $factores = trim($_POST['factores']);
    $id_factores = trim($_POST['id_factores']);
    $nota = trim($_POST['nota']);

    $consulta = "INSERT INTO unidadejer (id_unidad, factores, nota, id_factores)
    VALUES ('', '$factores', $nota, '$id_factores')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header('Location: ../vista_admin/factor_medicion.php');
  }
}
?>