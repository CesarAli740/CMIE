<?php 
require_once('config.php');
$id = $_POST['id'];
$pass = $_POST['new_password'];

$query = "UPDATE user set password= '$pass' WHERE id= $id";
$conexion->query($query);

header("Location: ../../includes/login.php?message=success_password");

?>