<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar División</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
    body {
        background-color: #ECF8F9;
    }
</style>
<body id="page-top">
    <form action="../includes/validar.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Registro División</h3>
                            <div class="form-group">
                                <label for="division" class="form-label">Nombre de la División*</label>
                                <input type="text" id="division" name="division" class="form-control" required>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" class="btn btn-success" name="registrar_division">
                            <a href="./division_unidad.php" class="btn btn-danger">Cancelar</a>
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