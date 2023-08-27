<?php

require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break;
            case 'editar_registro2':
                editar_registro2();
                break;
        case 'eliminar_registro';
            eliminar_registro();
            break;
    }
}

function editar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    extract($_POST);
    $consulta = "UPDATE mision SET  misionffaa = '$misionffaa', misioneunid = '$misioneunid', misionejer = '$misionejer' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    header('Location: ../vista_admin/cuadro_de_mando.php');

}
function editar_registro2()
{
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    extract($_POST);
    $consulta2 = "UPDATE division SET  mision_division = '$div' WHERE id = '$division' ";
    $consulta = "UPDATE unidad SET  mision_unidad = '$uni' WHERE id = '$unidad' ";

    mysqli_query($conexion, $consulta);
    mysqli_query($conexion, $consulta2);

    header('Location: ../vista_evaluador/cuadro_de_mando.php');

}

function eliminar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM mision WHERE id= $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../vista_admin/cuadro_de_mando.php');

}


?>