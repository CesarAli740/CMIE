<?php
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    $valor = $_POST['valor'];
    $conc = $_POST['conc'];
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];
    $consulta = "UPDATE subfactor SET $conc = '$valor' WHERE subfactor.tipo = '$tipo' AND subfactor.id = '$id';";
    mysqli_query($conexion, $consulta);
    echo "Actualización exitosa";
?>
