<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_GET['id'];
$rol = $_SESSION['rol'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}

?>
<?php include '../header.php'; ?>
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

<body>
    <br>
    <div class="container">
        <table class="table table-bordered table-active table-striped">
            <thead class="thead-active">
                <tr>
                    <td>
                        <?php

                        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                        $query = "SELECT * FROM unidad WHERE unidad.id = $unidad;";
                        $resultado = mysqli_query($conexion, $query);
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <center>
                                UNIDAD EVALUADA:
                                <?php echo $fila['nombre']; ?>
                            </center>
                            <?php
                        }

                        ?>

                    </td>
                </tr>

                <tr>
                    <th>
                        <center>NOTA FINAL</center>
                    </th>
                </tr>
                <tr>
                    <td>
                        <center>
                            <style>
                                .nota_final {
                                    font-size: 80px;
                                }
                            </style>
                            <?php

                            $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                            $query = "SELECT * FROM unidad WHERE unidad.id = $unidad;";
                            $resultado = mysqli_query($conexion, $query);
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <a class="nota_final">
                                    <?php echo $fila['nota']; ?>
                                </a>
                                <?php
                            }

                            ?>

                        </center>
                    </td>
                </tr>
            </thead>
        </table>
    </div>

    <div class="container">
        <table class="table table-bordered table-active table-striped">
            <thead class="thead-active">
                <tr>
                    <th colspan="3">
                        <center>RESUMEN GENERAL</center>
                    </th>
                </tr>
                <tr>
                    <th scope="col">
                        <center>DIMENSIONES</center>
                    </th>
                    <th scope="col">
                        <center>NOTA</center>
                    </th>
                    <th scope="col">
                        <center>VER MÁS</center>
                    </th>
                </tr>
                <?php
                $conc = 'c' . $unidad;
                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $query = "SELECT * FROM dimensiones";
                $resultado = mysqli_query($conexion, $query);
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <tr>
                        <td scope="col">
                            <center>
                                <?php echo $fila['dimension']; ?>
                            </center>
                        </td>
                        <td scope="col">
                            <style>
                                p.notafinal {
                                    font-size: 20px;
                                }
                            </style>
                            <center>
                                <p class="notafinal">
                                    <?php
                                    echo $fila[$conc];
                                    ?>
                                </p>
                            </center>
                        </td>
                        <td scope="col">
                            <center><a class="boton" href="./ver_factores.php?id=<?php ?>">
                                    <i class="fas fa-eye"></i></a></center>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </thead>
        </table>
    </div>

    <form method="post" action="./reporte.php">
        <center>
            <div class="mb-3">
                <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $_GET['id']; ?>">
                <button type="submit" name="generar_pdf" class="boton">Generar PDF</button>
                <a href="./principal.php" class="botonr">Volver</a>
            </div>
        </center>
    </form>

</html>