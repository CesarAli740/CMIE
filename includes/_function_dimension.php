<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 
            case 'eliminar_registro';
            eliminar_registro();
            break;
		}
	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","CMIE");
		extract($_POST);
		$consulta="UPDATE dimension SET dimensiones = '$dimensiones', definicion = '$definicion' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);

		header('Location: ../vista_admin/cuadro_de_mando.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","CMIE");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM dimension WHERE id= $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../vista_admin/cuadro_de_mando.php');

}


?>