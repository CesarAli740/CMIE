<?php

session_start();
error_reporting(0);

$id_dimension = $_GET['id'];

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
    <div class="container">
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $totalPonderaciones = 0;

            foreach ($_POST as $key => $value) {
                if (strpos($key, 'ponderacion_') === 0) {
                    $nota_id = substr($key, strlen('ponderacion_'));
                    $ponderacion = floatval($value);

                    $sql = "UPDATE dimensiones SET ponderacion = $ponderacion WHERE id = $nota_id";

                    if ($conexion->query($sql) === TRUE) {
                        $totalPonderaciones += $ponderacion;
                    } else {
                        echo "Error al actualizar la ponderación: " . $conexion->error;
                    }
                }
            }
        }


        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
        $sql = "SELECT id, dimension, ponderacion FROM dimensiones";
        $result = $conexion->query($sql);


        ?><br><br>
        <style>
            form {
                width: 100%;
                /* Ancho máximo del formulario */
                max-width: 30rem;
                /* Ancho máximo para contenido */
                margin: 20px auto;
                /* Centrar el formulario */
                padding: 20px;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                border-radius: 5px;
            }

            /* Estilos para las etiquetas */
            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            /* Estilos para los campos de entrada */
            input[type="number"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 3px;
                margin-bottom: 10px;
            }

            /* Estilos para el botón */
            input[type="submit"] {
                background-color: #007bff;
                border: none;
                color: #fff;
                padding: 10px;
                border-radius: 3px;
                cursor: pointer;
                width: 100%;
            }

            /* Estilos para el párrafo */
            p.dim {
                font-weight: bold;
                margin-top: 10px;
            }
        </style>
        <div class="form-container">
            <form method="post">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<label>' . $row['dimension'] . '</label>';
                        echo '<input type="number" step="0.01" name="ponderacion_' . $row['id'] . '" value="' . $row['ponderacion'] . '">';
                    }
                } else {
                    echo "No se encontraron notas.";
                }
                ?>
                <p class="dim">Total de Ponderaciones:
                    <?php echo $totalPonderaciones * 100 . ' %'; ?>
                </p>
                <input type="submit" value="Guardar Cambios">
            </form>
        </div>


    </div>
</body>