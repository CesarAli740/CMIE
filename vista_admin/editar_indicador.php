<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();


}

$id_unidad = $_GET['id'];
include('../includes/_db.php');
$consulta = "SELECT * FROM unidadejer WHERE id_unidad = $id_unidad";
$resultado = mysqli_query($conexion, $consulta);
$dimension = mysqli_fetch_assoc($resultado);

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


    <form action="../includes/_function_indicador.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                            <br>
                            <br>
                            <h3 class="text-center">Editar Indicadores</h3>
                            <div class="form-group">
                                <label for="factores" class="form-label">Indicador:</label>
                                <input type="text" id_unidad="factores" name="factores" class="form-control"
                                    value="<?php echo $unidadejer['factores']; ?>" required>
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id_unidad" value="<?php echo $id_unidad ?>">
                            </div>
                            <br>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="./factor_medicion.php" class="btn btn-danger">Cancelar</a>

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