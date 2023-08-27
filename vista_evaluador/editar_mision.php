<?php
$conexion = mysqli_connect("localhost", "root", "", "CMIE");
$uni = $_GET['uni'];
$div = $_GET['div'];
?>


<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/fontawesome-all.min.css">
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/es.css">
<style>
    body {
        background-color: #ECF8F9;
        margin-top: 1rem;
    }

    div.container {
        color: black;
    }
</style>

<body>
<form  action="../includes/_function_mision.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                            <br>
                            <br>
                            <h3 class="text-center">Editar Misiones</h3>
                            <?php
                            $divisionQuery = "SELECT * FROM division WHERE division.id = '$div';";
                            $divisionResult = mysqli_query($conexion, $divisionQuery);
                            if ($divisionResult->num_rows > 0) {
                                while ($divisionFila = mysqli_fetch_array($divisionResult)) {
                                    ?>
                                    <div class="form-group">
                                        <label for="div" class="form-label">Mision Division:</label>
                                        <input type="text" id="div" name="div" class="form-control"
                                            value="<?php echo $divisionFila['mision_division']; ?>" required>
                                    </div>
                                    <?php
                                }
                            }

                            ?>
                            <?php

                            $unidadQuery = "SELECT * FROM unidad WHERE unidad.id = '$uni';";
                            $unidadResult = mysqli_query($conexion, $unidadQuery);
                            if ($unidadResult->num_rows > 0) {
                                while ($unidadFila = mysqli_fetch_array($unidadResult)) {
                                    ?>
                                    <div class="form-group">
                                        <label for="uni" class="form-label">Mision Unidad:</label>
                                        <input type="hidden" name="accion" value="editar_registro2">
                                        <input type="hidden" name="division" value="<?php echo $_GET['div'] ?>">
                                        <input type="hidden" name="unidad" value="<?php echo $_GET['uni'] ?>">
                                        <input type="text" id="uni" name="uni" class="form-control" value="<?php echo $unidadFila['mision_unidad'];?>"
                                            required>
                                    </div>
                                    <?php
                                }
                            } ?>

                            <br>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="./cuadro_de_mando.php" class="btn btn-danger">Cancelar</a>

                            </div>
                        </div>
                    </div>

    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>

</html>