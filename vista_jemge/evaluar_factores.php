<?php

session_start();
error_reporting(0);

$id_dimension = $_SESSION['rol'] - 1;

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

</head>
<?php

session_start();
error_reporting(0);
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
                            Visualizando:
                            <?php echo $_SESSION['nombre']; ?>
                        </center>
                    </td>
                </tr>
            </thead>
        </table>
    </div>



    <form action="../includes/validar_factor.php" method="POST">
        <div class="container">

            <table class="table table-bordered table-active table-striped">


                <?php
                $dimen = '';
                for ($i = 1; $i < 9; $i++) {
                    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                    $SQL = " SELECT * FROM notas_factores
                WHERE tipo = '$i';";
                    $dato = mysqli_query($conexion, $SQL);


                    ?>
                    <thead class="thead-active">
                        <?php 
                        if ($i == 1) {
                            $dimen = 'Comandante';
                        } else
                        if ($i == 2) {
                            $dimen = '2do Comandante';
                        } else
                        if ($i == 3) {
                            $dimen = 'Personal';
                        } else
                        if ($i == 4) {
                            $dimen = 'Inteligencia';
                        } else
                        if ($i == 5) {
                            $dimen = 'Operaciones';
                        } else
                        if ($i == 6) {
                            $dimen = 'Logistica';
                        } else
                        if ($i == 7) {
                            $dimen = 'Accion Civica';
                        } else
                        if ($i == 8) {
                            $dimen = 'Derechos Humanos';
                        }
                        ?>
                        <tr>
                            <th colspan="2">
                                <center><?php echo $dimen ?></center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 80%;">
                                <center><strong>Factores</strong></center>
                            </td>
                            <td style="width: 20%;">
                                <center><strong>Subfactores</strong></center>
                            </td>
                        </tr>
                    </tbody>
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
                                        <center>
                                            <a class="btn btn-success"
                                                href="./evaluar_subfactores.php?id=<?php echo $fila['id'] ?>&idu=<?php echo $_GET['id'] ?>">
                                                <i class="fas fa-eye"></i></a>
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
                }

                ?>
                </tbody>
            </table>
        </div>
        <center>
            <div class="mb-3">
                <input type="hidden" value="Guardar" class="boton" name="subir_nota_dimension">
                <input type="hidden" name="id_dimension" id="id_dimension" value="<?php echo $id_dimension; ?>">
                <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $_GET['id']; ?>">
                <a href="./principal.php" class="botonr">Volver</a>
            </div>
        </center>
    </form>
</body>
</form>