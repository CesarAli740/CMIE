<?php
$conexion= mysqli_connect("localhost", "root", "", "CMIE");

if(isset($_POST['registrar_dimension'])){
    if(strlen($_POST['dimensiones']) >=1 && strlen($_POST['definicion'])  >=1){
      
    $dimensiones = trim($_POST['dimensiones']);
    $definicion = trim($_POST['definicion']);
    $consulta= "INSERT INTO dimension (dimensiones, definicion)
    VALUES ('$dimensiones', '$definicion')";
    mysqli_query($conexion, $consulta);

    $consulta2= "INSERT INTO factores (id, nombre, aspectos)
    VALUES ('', '', NULL)";
    mysqli_query($conexion, $consulta2);
    
    /* $consulta3= "SELECT id FROM dimension WHERE dimensiones = '$dimensiones' ";
    $resultado = mysqli_query($conexion, $consulta3);
    
    $consulta4= "UPDATE factores SET id = '$resultado' WHERE id = '5565'";
    mysqli_query($conexion, $consulta4);
    mysqli_close($conexion); */
    header('Location: ../vista_admin/cuadro_de_mando.php');
  }
}
?>