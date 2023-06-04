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


        <?php
        $conc = "c" . $unidad;
        ?>

        <input type="hidden" value="<?php echo $conc; ?>" name="conc">
        <?php
        $a = 0;
        while ($a <= 5) {
            $a++;
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
                                                    <center>ACCIÓN CÍVICA</center>
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
                                    </div>
                <?php
            }
            ?>
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
                            <th>
                                <center>Opciones</center>
                            </th>
                        </tr>
                    </thead>
                    <col style="width:60%;" />
                    <col style="width:20%;" />
                    <col style="width:15%;" />

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
                                        <div class="form-group">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <style>
                                                            select.selector {
                                                                padding: 2px;
                                                                /* Espaciado interno para el contenido */
                                                                font-size: 16px;
                                                                /* Tamaño de fuente */
                                                                border: 1px solid #ccc;
                                                                /* Borde */
                                                                border-radius: 4px;
                                                                /* Esquinas redondeadas */
                                                                background-color: transparent;
                                                                /* Color de fondo */
                                                                color: #333;
                                                                /* Color del texto */
                                                                width: 200px;
                                                                /* Ancho del select */
                                                            }

                                                            /* Estilo al pasar el cursor sobre el select */
                                                            select.selector:hover {
                                                                border-color: #999;
                                                                /* Color del borde al pasar el cursor */
                                                            }

                                                            /* Estilo al enfocar el select */
                                                            select.selector:focus {
                                                                outline: none;
                                                                /* Quitar el contorno de enfoque predeterminado */
                                                                box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
                                                                /* Sombra alrededor del select */
                                                            }
                                                        </style>
                                                        <select class="selector"
                                                            onchange="actualizarValor(this.value, '<?php echo $conc ?>', '<?php echo $a ?>', '<?php echo $fila['id'] ?>')">
                                                            <option value="0">-- Seleccionar --</option>
                                                            <option value="0">0</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="75">75</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="./editar_factor.php?id=<?php echo $fila['id'] ?> ">
                                            <i class="fas fa-edit"></i> </a>
                                        <a class="btn btn-danger" href="./eliminar_factor.php?id=<?php echo $fila['id'] ?>">
                                            <i class="fas fa-trash"></i></a>

                                        <!-- 
                                    <a class="btn btn-success" href="./crear_factor.php?id=<?php echo $fila['id_factores'] ?>">
                                        <i class="fas fa-plus"></i></a> -->
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
                <input type="submit" value="Guardar" class="boton" name="subir_nota">

                <a href="./principal.php" class="botonr">Cancelar</a>

            </div>
        </center>
    </form>
</body>