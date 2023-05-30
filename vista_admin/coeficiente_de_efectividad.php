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
<body>

    <?php

    $mediafinal_array = array(); // Arreglo para almacenar los valores de $mediafinal
    $o = 2;
    while ($o < 8) {
        $conn = mysqli_connect("localhost", "root", "", "CMIE");
        $sql = "SELECT AVG(nota) AS media FROM unidadejer WHERE unidadejer.id_factores = $unidad AND unidadejer.rol = $o AND unidadejer.tipo = 1";
        $result = $conn->query($sql);
        $query = "SELECT AVG(nota) AS media FROM unidadejer WHERE unidadejer.id_factores = $unidad AND unidadejer.rol = $o AND unidadejer.tipo = 2";
        $resultado = $conn->query($query);

        if ($result->num_rows > 0 and $resultado->num_rows > 0) {
            // Obtener el valor de la media
            $row = $result->fetch_assoc();
            $media = $row["media"];
            $media = round($media, 2);

            $row2 = $resultado->fetch_assoc();
            $media2 = $row2["media"];
            $media2 = round($media2, 2);

            $mediafinal = ($media + $media2) / 2;

            $mediafinal_array[] = $mediafinal; // Agregar $mediafinal al arreglo
    
            $valor1 = $mediafinal_array[0] * 0.2;
            $valor2 = $mediafinal_array[1] * 0.15;
            $valor3 = $mediafinal_array[2] * 0.2;
            $valor4 = $mediafinal_array[3] * 0.2;
            $valor5 = $mediafinal_array[4] * 0.1;
            $valor6 = $mediafinal_array[5] * 0.15;
            $mediatotalfinal = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6;
            $mediatotalfinal = round($mediatotalfinal, 2);

            ?>
            <?php
        } else {
            echo "No se encontraron resultados.";
        }
        $o++;
    }
    ?>

<br>
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
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
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
                                    <?php echo $mediafinal_array[$c - 2]; ?>
                                </p>
                            </center>


                        </td>
                        <td scope="col">
                            <center><a class="btn btn-success"
                                    href="./ver_factores.php?id=<?php echo $c; ?>">
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
            <button type="submit" name="generar_pdf" class="btn btn-success">Generar PDF</button>
            <a href="./principal.php" class="btn btn-danger">Volver</a>
        </div>
    </center>
    </form>

</html>