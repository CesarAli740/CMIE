<?php include '../header.php'; ?>
<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];
$nombre_unidad = $_SESSION['unidad'];

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
    <title>Document</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
		integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
		crossorigin="anonymous"></script>
</head>

<body><br>
    <div class="container">
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <center>NOTA FINAL</center>
                    </th>
                </tr>
                <tr>
                    <td>
                        <center>
                            UNIDAD EVALUADA:
                            <?php echo $_SESSION['unidad']; ?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <style>
                                .nota_final {
                                    font-size: 80px;
                                }
                            </style>
                            <a class="nota_final">10</a>
                        </center>
                    </td>
                </tr>
            </thead>
        </table>
    </div>


    <div class="container">
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="3">
                        <center>RESUMEN GENERAL</center>
                    </th>
                </tr>
                <tr>
                    <td scope="col">
                        <center>DIMENSIONES</center>
                    </td>
                    <td scope="col">
                        <center>NOTA</center>
                    </td>
                    <td scope="col">
                        <center>VER MÁS</center>
                    </td>
                </tr>
                <?php
                $c = 2;
                while ($c < 8) {
                    $dimen = '';
                    if ($c == 2) {
                        $dimen = 'PERSONAL';
                    } else if ($c == 3) {
                        $dimen = 'INTELIGENCIA';
                    } else if ($c == 4) {
                        $dimen = 'OPERACIONES';
                    } else if ($c == 5) {
                        $dimen = 'LOGISTICA';
                    } else if ($c == 6) {
                        $dimen = 'ACC. CIVICA';
                    } else if ($c == 7) {
                        $dimen = 'DERECHOS HUMANOS';
                    }
                    ?>
                    <tr>
                        <td scope="col">
                            <center>
                                <?php echo $dimen; ?>
                            </center>
                        </td>
                        <td scope="col">
                            <center>NOTA</center>
                        </td>
                        <td scope="col">
                            <center><a class="btn btn-success"
										href="./eliminar_indicador.php?id=<?php echo $fila['id_unidad'] ?>">
										<i class="fas fa-eye"></i></a></center>
                        </td>
                    </tr>
                    <?php
                    $c++;
                }
                ?>


            </thead>
        </table>
    </div>
</body>

</html>