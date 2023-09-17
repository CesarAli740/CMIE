<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}
$id_unidad = $_SESSION['unidad'];
$id_division = $_SESSION['division'];
$id = $_SESSION['id']; 

?>

<link rel="stylesheet" href="../css/es.css">

<?php include '../header.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Página</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap');

  :root {
    font-family: 'Roboto', sans-serif;
  }

  /* Estilos para los botones */
  .boton {
    background-color: #4F494A;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    font-family: 'Roboto', sans-serif;

  }

  .titulo {
    border-radius: 5px;
    margin: 3%;
    padding: 1px;
    text-align: center;
  }

  /* Estilos para el contenedor de los botones */
  .botones {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  /* Estilos para los botones en pantalla grande */
  @media screen and (min-width: 600px) {
    .boton {
      width: 40%;
      margin: 20px;
    }
  }

  /* Estilos para los botones en pantalla pequeña */
  @media screen and (max-width: 599px) {
    .boton {
      width: 80%;
    }
  }
</style>

    
<div class="container">
  <div class="titulo">
    <h1 class="display-4">Sistema Estratégico para Determinar la Eficiencia Combativa</h1>
  </div>
  <center>
    <form action="procesar.php" method="post">
      <input type="hidden" id="gunidad" name="gunidad" value="<?php echo $nombre_gunidad; ?>">
      <br>

      <label for="division">División:</label>
      <select class="form-select" id="division" name="division" onchange="loadUnidades()">
        <option value="" selected>Seleccionar División</option>
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
        <option value="" selected>Seleccionar Unidad</option>
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
        unidadSelect.innerHTML = ""; // Limpia las opciones actuales

        var unidades = JSON.parse(xhr.responseText);

        // Agrega la primera opción "Seleccionar una Unidad"
        var firstOption = document.createElement("option");
        firstOption.value = "";
        firstOption.text = "Seleccionar una Unidad";
        unidadSelect.appendChild(firstOption);

        // Agrega las unidades desde el servidor
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


    </form>
    <form action="../includes/_functions.php" method="POST">
      <div class="botones">
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="accion" value="editar_registro3">
        <button class="boton" name="evaluar" onClick="window.location.href='./evaluar.php';"><strong>Notas
            Detalladas</strong></button>
        <button class="boton" name="coeficiente"
          onClick="window.location.href='./coeficiente_de_efectividad.php';"><strong>Nota Final</strong></button>
      </div>

      <input type="hidden" id="unidadId" name="unidadId" value="">
      <input type="hidden" id="divisionId" name="divisionId" value="">

      <script>
        var divisionSelect = document.getElementById("division");
        var unidadSelect = document.getElementById("unidad");

        divisionSelect.addEventListener("change", function () {
          var divisionId = this.value;
          document.getElementById("divisionId").value = divisionId;
        });

        unidadSelect.addEventListener("change", function () {
          var unidadId = this.value;
          document.getElementById("unidadId").value = unidadId;
        });

      </script>
    </form>


    </body>

</html>