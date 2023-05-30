<?php

session_start();
error_reporting(0);

$evaluador = $_GET['id'];
$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Página</title>
    <link rel="stylesheet" type="text/css" href="./principal.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
        integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function actualizarValor(valor, factores2, unidad) {
            $.ajax({
                url: './actualizar.php',
                method: 'POST',
                data: { valor: valor, factores2: factores2, unidad: unidad },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function actualizarValor2(valor, factores2, unidad) {
            $.ajax({
                url: './actualizar2.php',
                method: 'POST',
                data: { valor: valor, factores2: factores2, unidad: unidad },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

    </script>
</head>
<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();

}


?>
<?php include '../header.php'; ?>


<body>
    <form action="../includes/validar_factor.php" method="POST">
        <br>
        <div class="container">
            <table class="table table-bordered table-dark table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            <center>CUADRO DE MANDO INTEGRAL DEL EJERCITO</center>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                Visualizando: <?php echo $_SESSION['nombre']; ?>
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
                        <th>
                            <center>Presencia o Ausencia</center>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="container">

            <table class="table table-bordered table-dark table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            <center>Factores</center>
                        </th>
                        <th>
                            <center>Nota
                            </center>
                        </th>
                    </tr>
                </thead>
                <col style="width:60%;" />
                <col style="width:40%;" />

                <?php

                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $SQL = "SELECT unidadejer.id_unidad, unidadejer.factores, unidadejer.nota, unidadejer.id_factores FROM unidadejer WHERE unidadejer.tipo = 1 AND unidadejer.rol = '$evaluador' AND unidadejer.id_factores = '$unidad';";
                $dato = mysqli_query($conexion, $SQL);

                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                        ?>

                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $fila['factores']; ?>
                                </td>
                                <td>
                                            <center>
                                                <p style="font-weight: bold; font-size: x-large">
                                                    <strong><?php echo $fila['nota']; ?></strong>
                                                </p>
                                            </center>
                            </td>
                            </tr>
                            <?php
                    }
                } else {

                    ?>
                        <tr class="text-center">
                            <td colspan="16">No existen registros</td>
                        </tr>
                        <?php

                }

                ?>
                </tbody>
            </table>
        </div>
    </form>
</body>
</form>



<form action="../includes/validar_factor.php" method="POST">
    <div class="container">
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <center>Grado del Factor a ser Medido</center>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="container">

        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <center>Factores</center>
                    </th>
                    <th>
                        <center>Nota
                        </center>
                    </th>
                </tr>
            </thead>
            <col style="width:60%;" />
            <col style="width:40%;" />

            <?php

            $conexion = mysqli_connect("localhost", "root", "", "CMIE");
            $SQL = "SELECT unidadejer.id_unidad, unidadejer.factores, unidadejer.nota, unidadejer.id_factores FROM unidadejer WHERE unidadejer.tipo = 2 AND unidadejer.rol = '$evaluador' AND unidadejer.id_factores = '$unidad';";
            $dato = mysqli_query($conexion, $SQL);


            if ($dato->num_rows > 0) {
                while ($fila = mysqli_fetch_array($dato)) {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $fila['factores']; ?>
                            </td>
                            <td>
                                            <center>
                                                <p style="font-weight: bold; font-size: x-large">
                                                    <strong><?php echo $fila['nota']; ?></strong>
                                                </p>
                                            </center>
                            </td>
                        </tr>
                        <?php
                }
            } else {

                ?>
                    <tr class="text-center">
                        <td colspan="16">No existen registros</td>
                    </tr>
                    <?php

            }

            ?>
            </tbody>
        </table>
    </div>
    <center>
        <div class="mb-3">
            <a href="./coeficiente_de_efectividad.php" class="btn btn-danger">Volver</a>

        </div>
    </center>
</form>
</body>
</form>