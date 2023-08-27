<?php include '../header.php'; ?>
<?php
$id_division = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
        integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/es.css">
    <title>Unidad</title>
</head>
<style>
    body {
        background-color: #ECF8F9;
    }
</style>

<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
    $SQL = "SELECT division.nombre FROM division WHERE division.id = $id_division";
    $dato1 = mysqli_query($conexion, $SQL);
    while ($fila1 = mysqli_fetch_array($dato1)) {
        ?>
        <div class="container is-fluid">
            <div class="col-xs-12"><br>
                <h3>Lista de Unidades dentro de la 
                    <?php echo $fila1['nombre']; ?>
                </h3>
            <?php
    }
    ?>
            <div>
                <a class="btn btn-success" href="./registrar_unidad.php?id=<?php echo $id_division; ?>">Nueva Unidad
                    <i class="fa fa-plus"></i> </a>
            </div>
            <br>
            </form>
            <table class="table table-responsive-sm table-striped table-active " id="table_id">
                <thead>
                    <tr>
                        <th style="width: 70%;">Unidades</th>
                        <th style="width: 30%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SQL = "SELECT unidad.nombre, unidad.id FROM unidad WHERE unidad.division = $id_division;";
                    $dato = mysqli_query($conexion, $SQL);
                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $fila['nombre']; ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="editar_unidad.php?id=<?php echo $fila['id'] ?>&id2=<?php echo $id_division?> ">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="btn btn-danger" href="eliminar_unidad.php?id=<?php echo $fila['id'] ?>&id2=<?php echo $id_division?>">
                                        <i class="fas fa-trash"></i></a>
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

</body>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>


</html>