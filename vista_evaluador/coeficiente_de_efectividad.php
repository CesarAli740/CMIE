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

    <?php

    $mediafinal_array = array(); // Arreglo para almacenar los valores de $mediafinal
    $o = 2;
    while ($o < 8) {
        $conn = mysqli_connect("localhost", "root", "", "CMIE");
        $sql3 = "SELECT notas_finales.personal, notas_finales.inteligencia, notas_finales.operaciones, notas_finales.logistica, notas_finales.accion_civica, notas_finales.derechos_humanos FROM notas_finales WHERE notas_finales.id_unidad = $unidad";
        $result3 = $conn->query($sql3);
        while ($row = $result3->fetch_assoc()) {
            if ($o == 2) {
                $personal = $row['personal'];
                $valor1 = $personal * 0.166667;
            } else if ($o == 3) {
                $inteligencia = $row['inteligencia'];
                $valor2 = $inteligencia * 0.166667;
            } else if ($o == 4) {
                $operaciones = $row['inteligencia'];
                $valor3 = $inteligencia * 0.166667;
            } else if ($o == 5) {
                $logistica = $row['logistica'];
                $valor4 = $logistica * 0.166667;
            } else if ($o == 6) {
                $accion_civica = $row['accion_civica'];
                $valor5 = $accion_civica * 0.166667;
            } else if ($o == 7) {
                $derechos_humanos = $row['derechos_humanos'];
                $valor6 = $derechos_humanos * 0.166667;
            }
        }

        $mediatotalfinal = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6;
        $mediatotalfinal = round($mediatotalfinal, 2);
        
        $o++;
    }
    ?>

    <br>
    <div class="container">
        <table class="table table-bordered table-active table-striped">
            <thead class="thead-active">
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
                            <a class="nota_final">
                                <?php echo $mediatotalfinal; ?>
                            </a>
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

                            <style>
                                p.notafinal {
                                    font-size: 20px;
                                }
                            </style>
                            <center>
                                <p class="notafinal">

                                    <?php
                                    $sql3 = "SELECT notas_finales.personal, notas_finales.inteligencia, notas_finales.operaciones, notas_finales.logistica, notas_finales.accion_civica, notas_finales.derechos_humanos FROM notas_finales WHERE notas_finales.id_unidad = $unidad";
                                    $result3 = $conn->query($sql3);
                                    while ($row = $result3->fetch_assoc()) {
                                        if ($c == 2) {
                                            echo $row['personal'];
                                        } else if ($c == 3) {
                                            echo $row['inteligencia'];
                                        } else if ($c == 4) {
                                            echo $row['operaciones'];
                                        } else if ($c == 5) {
                                            echo $row['logistica'];
                                        } else if ($c == 6) {
                                            echo $row['accion_civica'];
                                        } else if ($c == 7) {
                                            echo $row['derechos_humanos'];
                                        }
                                    }
                                    ?>

                                </p>
                            </center>


                        </td>
                        <td scope="col">
                            <center><a class="boton" href="./ver_factores.php?id=<?php echo $c; ?>">
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

    <form method="post" action="./reporte.php">
        <center>
            <div class="mb-3">
                <button type="submit" name="generar_pdf" class="boton">Generar PDF</button>
                <a href="./principal.php" class="botonr">Volver</a>
            </div>
        </center>
    </form>

</html>