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
            case 'nota';
            nota();
            break;
		}
	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","CMIE");
		extract($_POST);
		$consulta="UPDATE unidadejer SET factores = '$factores' WHERE id_unidad = '$id_unidad' ";

		mysqli_query($conexion, $consulta);

		header('Location: ../vista_admin/factor_medicion.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","CMIE");
    extract($_POST);
    $id_unidad= $_POST['id_unidad'];
    $consulta= "DELETE FROM unidadejer WHERE id_unidad= '$id_unidad' ";
    mysqli_query($conexion, $consulta);
    header('Location: ../vista_admin/factor_medicion.php');

}

function nota(){
    $conexion=mysqli_connect("localhost","root","","CMIE");
    extract($_POST);
    $consulta="UPDATE unidadejer SET nota = '$nota' WHERE id_unidad = '$id_unidad' ";
    mysqli_query($conexion, $consulta);
    header('Location: ../vista_admin/factor_medicion.php');
}


?>