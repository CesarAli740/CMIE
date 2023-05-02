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
		$consulta="UPDATE unidadejer SET factores = '$factores' WHERE id_factores = '$id_factores' ";

		mysqli_query($conexion, $consulta);

		header('Location: ../vista_admin/factor_medicion.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","CMIE");
    extract($_POST);
    $id_factores= $_POST['id_factores'];
    $consulta= "DELETE FROM unidadejer WHERE id_factores= '$id_factores' ";
    mysqli_query($conexion, $consulta);
    header('Location: ../vista_admin/factor_medicion.php');

}


?>