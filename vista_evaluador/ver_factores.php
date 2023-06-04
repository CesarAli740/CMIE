<?php
session_start();
error_reporting(0);

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
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
        integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
        crossorigin="anonymous"></script>
    
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
        <br>

        <div class="container">
            <table class="table table-bordered table-active table-striped">
                <thead class="thead-active">
                    <tr>
                        <th>
                            <center>CUADRO DE MANDO INTEGRAL DEL EJERCITO</center>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                Editando: <strong>
                                    <?php echo $_SESSION['nombre']; ?>
                                </strong>
                            </center>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>


        <?php
        $conc = "c" . $unidad;
        ?>

        <?php
        $a = $_GET['id'];
        $a = $a - 1;
            $conexion = mysqli_connect("localhost", "root", "", "CMIE");
            $SQL = "SELECT notas_factores.id, notas_factores.nombre, notas_factores.$conc FROM notas_factores WHERE notas_factores.tipo = '$a';";
            $dato = mysqli_query($conexion, $SQL);

            if ($a == 1) {
                ?>
                <div class="container">
                    <table class="table table-bordered table-active table-striped">
                        <thead class="thead-active">
                            <tr>
                                <th>
                                    <center>PERSONAL</center>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <?php
            } else if ($a == 2) {
                ?>
                    <div class="container">
                        <table class="table table-bordered table-active table-striped">
                            <thead class="thead-active">
                                <tr>
                                    <th>
                                        <center>INTELIGENCIA</center>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                <?php
            } else if ($a == 3) {
                ?>
                        <div class="container">
                            <table class="table table-bordered table-active table-striped">
                                <thead class="thead-active">
                                    <tr>
                                        <th>
                                            <center>OPERACIONES</center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                <?php
            } else if ($a == 4) {
                ?>
                            <div class="container">
                                <table class="table table-bordered table-active table-striped">
                                    <thead class="thead-active">
                                        <tr>
                                            <th>
                                                <center>LOGÍSTICA</center>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                <?php
            } else if ($a == 5) {
                ?>
                                <div class="container">
                                    <table class="table table-bordered table-active table-striped">
                                        <thead class="thead-active">
                                            <tr>
                                                <th>
                                                    <center>ACCIÓN CIVICA</center>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                <?php
            } else if ($a == 6) {
                ?>
                                    <div class="container">
                                        <table class="table table-bordered table-active table-striped">
                                            <thead class="thead-active">
                                                <tr>
                                                    <th>
                                                        <center>DERECHOS HUMANOS</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
            <?php } ?>
            </div>
            <div class="container">

                <table class="table table-responsive-sm table-bordered table-active table-striped">
                    <thead class="thead-active">
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
                    <col style="width:20%;" />

                    <?php
                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            ?>

                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $fila['nombre']; ?>
                                    </td>
                                    <td>
                                        <center><strong><?php echo $fila[$conc]; ?></strong></center>
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

                <a href="./coeficiente_de_efectividad.php" class="botonr">Cancelar</a>

            </div>
        </center>
</body>