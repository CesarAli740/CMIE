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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function actualizarValor(valor, conc, tipo, id) {
            $.ajax({
                url: './actualizar.php',
                method: 'POST',
                data: { valor: valor, conc: conc, tipo: tipo, id: id },
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

        <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $unidad; ?>">
        <br>
        
        <div class="container">
            <table class="table table-bordered table-active table-striped">
                <thead class="thead-active">
                    <tr>
                        <th>
                            <center>CUADRO DE MANDO INTEGRAL DEL EJÉRCITO</center>
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



        <div class="container is-fluid">

        <table class="table table-responsive-sm table-striped table-active ">
            <thead>
                <tr>
                    <th><center>Dimensiones</center></th>
                    <th><center>Factores</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $SQL = "SELECT * FROM dimensiones;";
                $dato = mysqli_query($conexion, $SQL);
                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $fila['dimension']; ?>
                            </td>
                            <td>
                                <center><a class="btn btn-success" href="./ver_factores.php?id=<?php echo $fila['id'] ?> ">
                                    <i class="fas fa-eye"></i></a></center>
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

                <input type="submit" value="Guardar" class="boton" name="subir_nota">
                <a href="./principal.php" class="botonr">Cancelar</a>

            </div>
        </center>
    </form>
</body>