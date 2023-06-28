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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Dimension</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion del registro?</p>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <form action="../includes/_functions.php" method="POST">
                            <input type="hidden" name="accion" value="eliminar_factor">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="id_dimen" value="<?php echo $_GET['id_dimen']; ?>">
                            <input type="submit" name="" value="Eliminar" class=" btn btn-danger">
                               <a href="./ver_factores.php?id=<?php echo $_GET['id_dimen']?>" class="btn btn-success">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>