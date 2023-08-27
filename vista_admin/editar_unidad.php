<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();


}

$id_unidad = $_GET['id'];
$id_division = $_GET['id2'];
$conexion = mysqli_connect("localhost", "root", "", "CMIE");
$consulta = "SELECT * FROM unidad WHERE division = $id_division AND id = $id_unidad";
$resultado = mysqli_query($conexion, $consulta);
$unidad = mysqli_fetch_assoc($resultado);

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

    div.container {
        color: black;
    }
</style>

<body id="page-top">


    <form action="../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                            <br>
                            <br>
                            <h3 class="text-center">Editar Unidad</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Unidad:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="<?php echo $unidad['nombre']; ?>" required>
                                <input type="hidden" name="accion" value="editar_unidad">
                                <input type="hidden" name="id" value="<?php echo $id_unidad ?>">
                                <input type="hidden" name="id2" value="<?php echo $id_division ?>">
                            </div>
                            <br>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="./ver_unidades.php?id=<?php echo $id_division ?>" class="btn btn-danger">Cancelar</a>

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