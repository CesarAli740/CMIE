<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
  header("Location: ../includes/login.php");
  die();
}
?>
<?php
$rol = $_SESSION['rol'];
$nombre_division = $_SESSION['division'];
?>
<!doctype html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background: #DADDDF;
  }

  button {
    border: 0;
    padding: 0;
    font-family: inherit;
    background: transparent;
    color: inherit;
    cursor: pointer;
  }

  .boton {
    text-decoration: none;
    background-color: #3F4044;
    border: none;
    color: white;
    padding: 0.375rem 0.75rem;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    font-family: 'Roboto', sans-serif;
  }

  a.botonr {
    text-decoration: none;
    background-color: #B70404;
    border: none;
    color: white;
    padding: 0.375rem 0.75rem;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    font-family: 'Roboto', sans-serif;
  }

  a.boton {
    text-decoration: none;
    background-color: #3F4044;
    border: none;
    color: white;
    padding: 0.575rem 2rem;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    font-family: 'Roboto', sans-serif;
  }

  .navbar {
    position: relative;
    z-index: 1;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 64px;
    background: #3F4044;
    color: #f9f9f9;
    font-family: "Poppins";
    box-sizing: border-box;
  }

  @media only screen and (min-width: 600px) {
    .navbar {
      justify-content: space-between;
    }

  }

  .navbar2 {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    background: #4F494A;
    color: #f9f9f9;
    font-family: "Poppins";
  }


  .navbar-overlay {
    position: fixed;
    z-index: 2;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    visibility: hidden;
    opacity: 0;
    transition: 0.3s;
  }

  body.open .navbar-overlay {
    visibility: visible;
    opacity: 1;
  }

  @media only screen and (min-width: 600px) {
    .navbar-overlay {
      display: none;
    }
  }

  .navbar-burger {
    position: absolute;
    top: 0;
    left: 0;
    display: grid;
    place-items: center;
    width: 64px;
    height: 64px;
    padding: 0;
  }

  @media only screen and (min-width: 600px) {
    .navbar-burger {
      display: none;
    }
  }

  .navbar-title {
    margin: 0;
    font-size: 16px;
  }

  .navbar-menu {
    position: fixed;
    z-index: 3;
    top: 0;
    left: 0;
    translate: -100% 0;
    width: 270px;
    height: 100%;
    padding: 20px;
    display: flex;
    gap: 8px;
    flex-direction: column;
    align-items: center;
    background: #000000;
    visibility: hidden;
    transition: translate 0.3s;
  }

  body.open .navbar-menu {
    translate: 0 0;
    visibility: visible;
  }

  @media only screen and (min-width: 600px) {
    .navbar-menu {
      position: static;
      translate: 0 0;
      width: auto;
      background: transparent;
      flex-direction: row;
      visibility: visible;
    }
  }

  .navbar-menu>button {
    color: rgba(255, 255, 255, 0.5);
    background: transparent;
    padding: 0 8px;
  }

  .navbar-menu>button.active {
    color: inherit;
  }

  p.navbar3 {
    margin: 0.25rem;
  }

  a.navbar3 {
    margin: 0.25rem;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-toggle {
    background-color: #3F4044;
    color: white;
    border: none;
    padding: 0.375rem 0.75rem;
    cursor: pointer;
    font-size: 16px;
  }

  .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 100px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    top: 100%;
    left: 0;
    margin-top: 4px;
  }

  .dropdown-menu a {
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333333;
  }

  .show {
    display: block;
  }

  .imagen_logo {
    width: 3rem;
    height: auto;
  }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
  integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

<body>
  <?php
  $conexion = mysqli_connect("localhost", "root", "", "CMIE");
  $consulta = "SELECT rol FROM permisos WHERE id = $rol";
  $resultado = mysqli_query($conexion, $consulta);
  if ($fila = mysqli_fetch_assoc($resultado)) {
    $nombre_rol = $fila['rol'];
  }
  $consulta = "SELECT * FROM division WHERE id = $nombre_division";
  $resultado = mysqli_query($conexion, $consulta);
  if ($fila = mysqli_fetch_assoc($resultado)) {
    $div_nombre = $fila['nombre'];
  }

  ?>
  <nav class="navbar2">

    <a class="navbar3">CMIE</a>
    <a class="navbar3">
      <?php echo $nombre_rol; ?> -
      <?php echo $div_nombre; ?>
    </a>
    <p class="navbar3" id="fecha"></p>
    <a href="../includes/_sesion/cerrarSesion.php"><i class="fa fa-power-off"
        style="color: #FFF; margin-right: 1rem;"></i> </a>

    <script>
      var fechaActual = new Date();
      var diaSemana = obtenerDiaSemana(fechaActual.getDay());
      var diaMes = fechaActual.getDate();
      var mes = obtenerMes(fechaActual.getMonth());
      var anio = fechaActual.getFullYear();
      var fechaFormateada = diaSemana + " " + diaMes + " de " + mes + " de " + anio;
      document.getElementById("fecha").textContent = fechaFormateada;
      function obtenerDiaSemana(numeroDia) {
        var diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        return diasSemana[numeroDia];
      }
      function obtenerMes(numeroMes) {
        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        return meses[numeroMes];
      }
    </script>
  </nav>
  <nav class="navbar">
    <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

    <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
      <span class="material-icons">menu</span>
    </button>
    <img class="imagen_logo" src="../img/ejercito_logo.ico" alt="Logo" class="logo">
    <nav class="navbar-menu">
      <?php
      if ($rol == 1) {
        ?>
        <button type="button" onclick="window.location.href ='../vista_admin/principal.php'"
          class="active">Inicio</button>
        <button type="button" onclick="window.location.href ='../vista_admin/division_unidad.php'"
          class="active">Division/Unidad</button>
        <button type="button" onclick="window.location.href ='../vista_admin/ponderacion.php'"
          class="active">Ponderaciones</button>
        <button type="button" onclick="window.location.href ='../views/user.php'"
          class="active">Usuarios</button><!-- 
        <button type="button" onclick="window.location.href ='../views/ranking.php'" class="active">Ranking</button> -->
        <?php
      } else if ($rol == 2 or $rol == 3) {
        ?>
          <button type="button" onclick="window.location.href ='../vista_evaluador/principal.php'"
            class="active">Inicio</button>
          <button type="button" onclick="window.location.href ='../vista_evaluador/ranking.php'"
            class="active">Ranking</button>
        <?php
      } else if ($rol == 4 or $rol == 5 or $rol == 6 or $rol == 7 or $rol == 8 or $rol == 9) {
        ?>
            <button type="button" onclick="window.location.href ='../vista_evaluador/principal.php'"
              class="active">Inicio</button>
        <?php
      } else if ($rol == 10) {
        ?>

              <button type="button" onclick="window.location.href ='../vista_jemge/principal.php'"
                class="active">Inicio</button>
              <button type="button" onclick="window.location.href ='../vista_jemge/ranking.php'" class="active">Ranking
                Unidades</button>
              <button type="button" onclick="ejecutarAcciones()" class="active">Rankig Divisiones</button>

              <script>
                function ejecutarAcciones() {
                  // Realiza la primera acción
                  window.location.href = '../vista_jemge/rankingD.php';
                }
              </script>
          <?php
          $conexion = mysqli_connect("localhost", "root", "", "CMIE");

          if (!$conexion) {
            die("Error en la conexión: " . mysqli_connect_error());
          }

          // Consulta SQL para calcular el promedio de las notas por división en la tabla "unidad"
          $sql_calculo_promedio = "SELECT division, AVG(nota) as promedio_notas FROM unidad GROUP BY division";

          $resultado_calculo = mysqli_query($conexion, $sql_calculo_promedio);

          if (!$resultado_calculo) {
            die("Error al calcular el promedio de las notas: " . mysqli_error($conexion));
          }

          // Consulta SQL para actualizar la tabla "división" con los promedios calculados
          $sql_actualizacion = "
    UPDATE division AS d
    JOIN (
        SELECT division, AVG(nota) as promedio_notas FROM unidad GROUP BY division
    ) AS u
    ON d.id = u.division
    SET d.nota = u.promedio_notas";

          $resultado_actualizacion = mysqli_query($conexion, $sql_actualizacion);

          if (!$resultado_actualizacion) {
            die("Error al actualizar la tabla 'división': " . mysqli_error($conexion));
          }

          ?>


        <?php
      }
      ?>
    </nav>
  </nav>
  <script type="text/javascript">const toggleMenuOpen = () => document.body.classList.toggle("open");</script>
</body>
<style>
  a {
    text-decoration: none;
  }
</style>