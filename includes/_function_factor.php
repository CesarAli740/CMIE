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
		$consulta="UPDATE notas_factores SET nombre = '$nombre' WHERE id = '$id'";

		mysqli_query($conexion, $consulta);

		header('Location: ../vista_admin/factor_admin.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","CMIE");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM notas_factores WHERE id= $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../vista_admin/factor_admin.php');

}


?>