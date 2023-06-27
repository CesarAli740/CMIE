<?php include '../header.php'; ?>
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
    <title>División/Unidad</title>
</head>
<style>
    body {
        background-color: #ECF8F9;
    }
</style>

<body>
    <div class="container is-fluid">
        <div class="col-xs-12"><br>
            <h3>Lista de Divisiones</h3>
            <div>
                <a class="btn btn-success" href="./registrar_division.php">Nueva División
                    <i class="fa fa-plus"></i> </a>

            </div>
            <br>
            </form>
            <table class="table table-responsive-sm table-striped table-active " id="table_id">
                <thead>
                    <tr>
                        <th style="width: 60%;">División</th>
                        <th style="width: 20%;">Unidades</th>
                        <th style="width: 20%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                    $SQL = "SELECT division.nombre, division.id FROM division;";
                    $dato = mysqli_query($conexion, $SQL);

                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {

                            ?>
                            <tr>
                                <td>
                                    <?php echo $fila['nombre']; ?>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="./ver_unidades.php?id=<?php echo $fila['id']; ?>">
                                        <i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="editar_division.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="btn btn-danger" href="eliminar_division.php?id=<?php echo $fila['id'] ?>">
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