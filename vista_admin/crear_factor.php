<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}



?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>


<style>
    body {
        background-image: url('../img/FondoMulti.svg');
        margin-top: 1rem;
    }

    div.container {
        color: #fff;
    }
</style>

<body id="page-top">


    <form action="../includes/validar_factor.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                            <br>
                            <br>
                            <h3 class="text-center">Registro Factor</h3>
                            <div class="form-group">
                                <label for="factores" class="form-label">Factor: </label>
                                <input type="text" id="factores" name="factores" class="form-control" required>
                            </div>
                            <br>
                            <div class="mb-3">

                                <input type="submit" value="Guardar" class="btn btn-success" name="registrar_factor">
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