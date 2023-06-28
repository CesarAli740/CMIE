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
                            Evaluando:
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
                                                        onchange="actualizarValor(this.value, '<?php echo $conc ?>', '<?php echo $a ?>', '<?php echo $fila['id'] ?>')">
                                                        <option value="<?php echo ($fila[$conc] != '') ? $fila[$conc] : '' ?>"><?php echo ($fila[$conc] != '') ? $fila[$conc] : 'Seleccione una Opción'?></option>
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
                
			<input type="submit" value="Guardar" class="boton" name="subir_nota_factor">
            
            <input type="hidden" name="id_factor" id="id_factor" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $_GET['idu']; ?>">
                <a href="./evaluar_factores.php?id=<?php echo $_GET['idu']?>" class="botonr">Volver</a>
            </div>
        </center>
    </form>
</body>
</form>