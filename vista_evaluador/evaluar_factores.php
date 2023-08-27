<?php

session_start();
error_reporting(0);

$id_dimension = $_SESSION['rol'] - 1;

$id = $_SESSION['id'];
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
                            <center>Factores</center>
                        </th>
                        <th>
                            <center>Subfactores</center>
                        </th>
                    </tr>
                </thead>

                <?php

                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $SQL = "SELECT * FROM notas_factores WHERE notas_factores.tipo = '$id_dimension';";
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

                ?>
                </tbody>
            </table>
        </div>
<script>
    function mostrarAdvertencia() {
      var confirmacion = confirm("¿Estás seguro de que deseas guardar la nota en la dimensión?, Esta acción no se puede repetir y sera imposible cambiar la nota despues de Aceptar");
      
      if (confirmacion) {
        document.getElementById("formulario").submit(); 
      } else {
        event.preventDefault();
      }
    }
  </script>
  
        <center>
            <div class="mb-3">
                <input type="submit" value="Guardar" class="boton" name="subir_nota_dimension" onclick="mostrarAdvertencia()">
                <input type="hidden" name="id_dimension" id="id_dimension" value="<?php echo $id_dimension; ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <input type="hidden" name="id_unidad" id="id_unidad" value="<?php echo $_GET['id']; ?>">
                <a href="./principal.php" class="botonr">Volver</a>
            </div>
        </center>
    </form>
</body>
</form>