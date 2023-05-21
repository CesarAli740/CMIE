<?php
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    $valor = $_POST['valor'];
    $factores2 = $_POST['factores2'];
    $consulta = "UPDATE unidadejer SET nota = '$valor' WHERE unidadejer.factores = '$factores2' AND unidadejer.tipo = 1";
    mysqli_query($conexion, $consulta);
    echo "Actualización exitosa";
?>