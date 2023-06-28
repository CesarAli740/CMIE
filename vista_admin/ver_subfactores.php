<?php

session_start();
error_reporting(0);

$id_factor = $_GET['id'];

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
    <center>
            <div>
                <a class="boton" href="./agregarFactores.php?id=<?php echo $_GET['id'] ?>">Nuevo SubFactor
                    <i class="fa fa-plus"></i> </a>
            </div>
        </center><br>
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
                <thead class="thead-active">
                    <tr>
                        <th>
                            <center>SubFactores</center>
                        </th>
                        <th>
                            <center>Nota</center>
                        </th>
                        <th>
                            <center>Acciones</center>
                        </th>
                    </tr>
                </thead>

                <?php

                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $SQL = "SELECT * FROM subfactor WHERE subfactor.tipo = '$id_factor';";
                $dato = mysqli_query($conexion, $SQL);


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
                                       <p>Nota Final</p>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-warning"
                                            href="editar_factor.php?id=<?php echo $fila['id']; ?>&id_dimen=<?php echo $_GET['id'] ?>">
                                            <i class="fas fa-edit"></i> </a>
                                        <a class="btn btn-danger"
                                            href="eliminar_factor.php?id=<?php echo $fila['id']; ?>&id_dimen=<?php echo $_GET['id'] ?>">
                                            <i class="fas fa-trash"></i></a>
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
                <a href="./ver_factores.php?id=<?php echo $_GET['id_dimen']?>" class="botonr">Volver</a>
            </div>
        </center>
    </form>
</body>
</form>