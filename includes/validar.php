<?php
$conexion = mysqli_connect("localhost", "root", "", "CMIE");

if (isset($_POST['registrar'])) {
  if (
    strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['telefono']) >= 1
    && strlen($_POST['password']) >= 1 && strlen($_POST['rol']) >= 1
  ) {

    $nombre = trim($_POST['nombre']);
    $apPAt = trim($_POST['apPAt']);
    $apMAt = trim($_POST['apMAt']);
    $correo = trim($_POST['correo']);
    $grado = trim($_POST['grado']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);
    $division = trim($_POST['division']);
    $unidad = trim($_POST['unidad']);

    $consulta = "INSERT INTO user (nombre, apPAt, apMAt, correo, grado, telefono, password, rol, division, unidad)
    VALUES ('$nombre', '$apPAt', '$apMAt', '$correo', '$grado','$telefono','$password', '$rol', '$division', '$unidad')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);


    header('Location: ../views/user.php');
  }
}



if (isset($_POST['registrar_unidad'])) {
  if (strlen($_POST['unidad']) >= 1) {

    $unidad = trim($_POST['unidad']);
    $id_division = trim($_POST['id_division']);
    $consulta = "INSERT INTO unidad (nombre, division) VALUES ('$unidad', '$id_division')";
    mysqli_query($conexion, $consulta);


    $sql = "SELECT * FROM unidad WHERE division = '$id_division' AND nombre = '$unidad';";
    $result = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_assoc($result)) {
            $id_unidad = $fila['id'];
        }
        $conc = 'c'.$id_unidad;
        $sql2 = "ALTER TABLE dimensiones ADD $conc DECIMAL(5,2);";
        $sql3 = "ALTER TABLE notas_factores ADD $conc DECIMAL(5,2);";
        $sql4 = "ALTER TABLE subfactor ADD $conc DECIMAL(5,2);";
        mysqli_query($conexion, $sql2);
        mysqli_query($conexion, $sql3);
        mysqli_query($conexion, $sql4);
    header('Location: ../vista_admin/ver_unidades.php?id=' . $id_division);
  }
}

if (isset($_POST['registrar_division'])) {
  if (strlen($_POST['division']) >= 1) {

    $division = trim($_POST['division']);
    $consulta = "INSERT INTO division (nombre) VALUES ('$division')";
    mysqli_query($conexion, $consulta);
    header('Location: ../vista_admin/division_unidad.php');
  }
}
?>