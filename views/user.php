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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/es.css">
  <title>Usuarios</title>
</head>
<style>
  body {
    background-color: #ECF8F9;
  }
</style>

<body>
  <div class="container is-fluid">
    <div class="col-xs-12"><br>
      <h1>Bienvenido Administrador
        <?php echo $_SESSION['nombre']; ?>
      </h1>
      <br>
      <h1>Lista de usuarios</h1>
      <br>
      <div>
        <a class="btn btn-success" href="./registrar.php">Nuevo usuario
          <i class="fa fa-plus"></i> </a>
        <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Salir
          <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>

      </div>
      <br><br>
      </form>
      <table class=" table table-responsive-sm table-striped table-active" id="table_id">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Grado</th>
            <th>Password</th>
            <th>Telefono</th>
            <!--    <th>Fecha</th> -->
            <th>Rol</th>
            <th>Division</th>
            <th>Unidad</th>
            <th>Acciones</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $conexion = mysqli_connect("localhost", "root", "", "CMIE");
          $SQL = "SELECT user.id, user.nombre, user.apPAt, user.apMAt, user.correo, user.grado, user.password, user.telefono,
user.fecha, permisos.rol, user.division, user.unidad, user.estado FROM user
LEFT JOIN permisos ON user.rol = permisos.id";
          $dato = mysqli_query($conexion, $SQL);

          if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

              ?>
              <tr>
                <td>
                  <?php echo $fila['nombre']; ?>
                </td>
                <td>
                  <?php echo $fila['apPAt'], " ", $fila['apMAt']; ?>
                </td>
                <td>
                  <?php echo $fila['correo']; ?>
                </td>
                <td>
                  <?php echo $fila['grado']; ?>
                </td>
                <td>
                  <?php echo $fila['password']; ?>
                </td>
                <td>
                  <?php echo $fila['telefono']; ?>
                </td>
                <!-- <td><?php echo $fila['fecha']; ?></td> -->
                <td>
                  <?php echo $fila['rol']; ?>
                </td>
                <td>
                  <?php echo $fila['division']; ?>
                </td>
                <td>
                  <?php echo $fila['unidad']; ?>
                </td>



                <?php if ($fila['estado'] == 3) { ?>
                  <td>
                    <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                      <i class="fa fa-edit"></i> </a>
                  </td>
                  <td><a class="btn btn-light"><i class="fa fa-check"></i></a></td>
                  <?php
                } else if ($fila['estado'] != 3) { ?>
                    <td>
                      <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?>">
                        <i class="fa fa-edit"></i> </a>
                      <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                        <i class="fa fa-trash"></i></a>
                    </td>
                    <td>
                      <script>
                        function ejecutarConsulta(id, x, button) {
                          var est = '';
                          if (x == 1) {
                            est = 0;
                          } else if (x == 0) {
                            est = 1;
                          }
                          $.ajax({
                            url: '../includes/estado.php',
                            method: 'POST',
                            data: {
                              id: id,
                              estado: est
                            },
                            success: function (response) {
                              console.log(response);
                              window.location.reload();
                            },
                            error: function (xhr, status, error) {
                              console.error(error);
                              alert('There was an error processing your request. Please try again later.');
                            }
                          });
                        }
                      </script>
                      <?php
                      if ($fila['estado'] == 1) {
                        $class = 'btn btn-light';
                      } else if ($fila['estado'] == 0) {
                        $class = 'btn btn-light';
                      } ?>
                      <a class="<?php echo $class; ?>"
                        onclick="ejecutarConsulta(<?php echo $fila['id']; ?>, <?php echo $fila['estado']; ?>,this)">
                        <i class="fa fa-<?php echo ($fila['estado'] == 1) ? 'check' : 'ban'; ?>"></i>
                      </a>
                    </td>
                  <?php } ?>
              </tr>
              <?php
            }
          } else { ?>
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