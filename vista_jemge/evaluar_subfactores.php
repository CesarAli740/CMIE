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
                <thead class="thead-active">
                    <tr>
                        <th>
                            <center>SubFactores</center>
                        </th>
                        <th>
                            <center>Nota</center>
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

                                    <div class="form-group">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <style>
                                                        select.selector {
                                                            padding: 2px;
                                                            font-size: 16px;
                                                            border: 1px solid #ccc;
                                                            border-radius: 4px;
                                                            background-color: transparent;
                                                            color: #333;
                                                            width: 200px;
                                                        }

                                                        select.selector:hover {
                                                            border-color: #999;
                                                        }

                                                        select.selector:focus {
                                                            outline: none;
                                                            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
                                                        }
                                                    </style>
                                                    <?php $conc = 'c' . $_GET['idu'];
                                                    $a = $fila['tipo'];
                                                    ?>
                                                    <select class="selector"
                                                        onchange="actualizarValor(this.value, '<?php echo $conc ?>', '<?php echo $a ?>', '<?php echo $fila['id'] ?>')" disabled>
                                                        <option value="<?php echo ($fila[$conc] != '') ? $fila[$conc] : '' ?>">
                                                            <?php
                                                            /* if ($fila[$conc] == 0) {
                                                                echo 'NULO';
                                                            } else if ($fila[$conc] == 25) {
                                                                echo 'MALO';
                                                            } else if ($fila[$conc] == 50) {
                                                                echo 'MEDIO';
                                                            } else if ($fila[$conc] == 75) {
                                                                echo 'BUENO';
                                                            } else if ($fila[$conc] == 100) {
                                                                echo 'EXCELENTE';
                                                            } else {
                                                                echo 'Aún no Evaluado';
                                                            }  */
                                                            
                                                            if ($fila[$conc] == 0) {
                                                                echo '0';
                                                            } else if ($fila[$conc] == 25) {
                                                                echo '25';
                                                            } else if ($fila[$conc] == 50) {
                                                                echo '50';
                                                            } else if ($fila[$conc] == 75) {
                                                                echo '75';
                                                            } else if ($fila[$conc] == 100) {
                                                                echo '100';
                                                            } else {
                                                                echo 'Aún no Evaluado';
                                                            }
                                                            ?>
                                                        </option>

                                                        <option value="0">NULO</option>
                                                        <option value="25">MALO</option>
                                                        <option value="50">MEDIO</option>
                                                        <option value="75">BUENO</option>
                                                        <option value="100">EXCELENTE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                <input type="hidden" value="Guardar" class="boton" name="subir_nota_factor">

                <input type="hidden" name="id_factor" id="id_factor" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $_GET['idu']; ?>">
                <a href="./evaluar_factores.php?id=<?php echo $_GET['idu'] ?>" class="botonr">Volver</a><br><br><br>
            </div>
        </center>
    </form>
    <style>
        .footer-text {
            /* Estilos previos al footer, como se mostró anteriormente */
            font-size: 14px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f8f8;
            height: 60px;
            /* Ajusta la altura del footer según tus necesidades */
            display: flex;
            justify-content: center;
            background: #1B9C85;
            color: #f9f9f9;
            align-items: center;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .footer div {
            padding-left: 2%;
            padding-right: 2%;
            display: flex;
            justify-content: space-between;
        }
    </style>
    <footer class="footer">
        <div>
            NULO = 0
        </div>
        <div>MALO = 25
        </div>
        <div>
            MEDIO = 50
        </div>
        <div>
            BUENO = 75
        </div>
        <div>
            EXCELENTE = 100
        </div>

    </footer>
</body>
</form>