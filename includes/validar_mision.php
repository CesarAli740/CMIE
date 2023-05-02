<?php
$conexion= mysqli_connect("localhost", "root", "", "CMIE");

if(isset($_POST['registrar_mision'])){

    if(strlen($_POST['misionffaa']) >=1 && strlen($_POST['misioneunid']) >=1 && strlen($_POST['misionejer'])  >=1){

    $misionffaa = trim($_POST['misionffaa']);
    $misioneunid = trim($_POST['misioneunid']);
    $misionejer = trim($_POST['misionejer']);

    $consulta= "INSERT INTO mision (misioneunid, misionffaa, misionejer)
    VALUES ('$misioneunid', '$misionffaa', '$misionejer')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../vista_admin/cuadro_de_mando.php');
  }
}


?>