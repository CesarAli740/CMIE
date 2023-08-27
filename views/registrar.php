<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
  header("Location: ./includes/login.php");
  die();
}



?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registros</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/es.css">
  <link rel="stylesheet" href="../css/styles.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

</head>
<style>
  body {
    background-color: #ECF8F9;
    color: black;
  }
</style>

<body id="page-top">


  <form action="../includes/validar.php" method="POST">
    <div id="login">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12"><br><br>
              <h3 class="text-center">Registro de nuevo usuario</h3>
              <div class="form-group">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="apPAt" class="form-label">Apellido Paterno *</label>
                <input type="text" id="apPAt" name="apPAt" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="apMAt" class="form-label">Apellido Materno *</label>
                <input type="text" id="apMAt" name="apMAt" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="username">Correo:</label><br>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="grado" class="form-label">Grado *</label>
                <input type="text" id="grado" name="grado" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="telefono" class="form-label">Telefono *</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña:</label><br>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="rol" class="form-label">Rol de usuario </label>
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-md-9">
                      <select class="form-select " type="number" id="rol" name="rol">
                        <?php
                        $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                        $SQL = "SELECT * FROM permisos;";
                        $dato = mysqli_query($conexion, $SQL);
                        if ($dato->num_rows > 0) {
                          while ($fila = mysqli_fetch_array($dato)) {
                            ?>
                            <option value="<?php echo $fila['id'] ;?>"><?php echo $fila['rol'] ;?></option>
                            <?php
                          }
                        } else {
                          ?>
                          <option value="">No Existen Registros</option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <label for="division">División:</label>
              <select class="form-select" id="division" name="division" onchange="loadUnidades()">
                <option value="">Seleccionar División</option>
                <?php
                $conexion = mysqli_connect("localhost", "root", "", "CMIE");

                if (!$conexion) {
                  die("Error al conectar a la base de datos: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM division";
                $resultado = mysqli_query($conexion, $query);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                  echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }

                mysqli_close($conexion);
                ?>
              </select>

              <label for="unidad">Unidad:</label>
              <select class="form-select" id="unidad" name="unidad">
                <option value="">Seleccionar Unidad</option>
              </select>

              <script>
                function loadUnidades() {
                  var divisionId = document.getElementById("division").value;
                  var unidadSelect = document.getElementById("unidad");
                  unidadSelect.innerHTML = "<option value=''>Cargando...</option>";

                  var xhr = new XMLHttpRequest();
                  xhr.open("GET", "registrar_unidades.php?divisionId=" + divisionId, true);
                  xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                      unidadSelect.innerHTML = "";

                      var unidades = JSON.parse(xhr.responseText);

                      unidades.forEach(function (unidad) {
                        var option = document.createElement("option");
                        option.value = unidad.id;
                        option.text = unidad.nombre;
                        unidadSelect.appendChild(option);
                      });
                    }
                  };
                  xhr.send();
                }
              </script>



              <div class="mb-3">

                <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
                <a href="./user.php" class="btn btn-danger">Cancelar</a>

              </div>

  </form>
</body>

</html>