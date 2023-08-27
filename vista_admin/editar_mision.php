<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    

}

$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "CMIE");
$consulta= "SELECT * FROM mision WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$mision = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<style>
    body {
        background-color:  #ECF8F9;
        margin-top: 1rem;
    }
    div.container{
     color: black;
    }
</style>
<body id="page-top">


<form  action="../includes/_function_mision.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Editar Misiones</h3>
                            <div class="form-group">
                                <label for="misionejer">Mision del Ejercito:</label><br>
                                <input type="text" name="misionejer" id="misionejer" class="form-control" value="<?php echo $mision['misionejer'];?>"required>
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
                            <div class="form-group">
                                <label for="misionffaa" class="form-label">Mision Division:</label><!-- misionffaa es mision de la division -->
                                <input type="text"  id="misionffaa" name="misionffaa" class="form-control" value="<?php echo $mision['misionffaa'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="misioneunid" class="form-label">Mision Unidad:</label>
                                <input type="text"  id="misioneunid" name="misioneunid" class="form-control" value="<?php echo $mision['misioneunid'];?>"required>
                            </div>
                           <br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="./cuadro_de_mando.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>