<?php
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    $valor = $_POST['valor'];
    $conc = $_POST['conc'];
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];
    $consulta = "UPDATE notas_factores SET $conc = '$valor' WHERE notas_factores.tipo = '$tipo' AND notas_factores.id = '$id'";
    mysqli_query($conexion, $consulta);
    echo "Actualización exitosa";
?>
