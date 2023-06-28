<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$id_division = $_SESSION['division'];

if ($validar == null || $validar = '') {
  header("Location: ../includes/login.php");
  die();
}

?>

<?php include '../header.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head> <br>


<body>
  <style>
    .titulo_ranking {
      padding: 3rem;
      text-align: center;
    }

    .titulo_ranking h1 {
      font-size: 24px;
      margin: 0;
    }

    @media screen and (max-width: 768px) {
      .titulo_ranking h1 {
        font-size: 18px;
      }
    }
  </style>

  <div class="titulo_ranking">
    <?php

    $consulta = "SELECT * FROM division WHERE id = $id_division";
    $resultado = mysqli_query($conexion, $consulta);
    if ($fila = mysqli_fetch_assoc($resultado)) {
      $div_nombre = $fila['nombre'];
    }
    ?>
    <h1>Ranking de las Unidades de la
      <?php echo $div_nombre; ?>
    </h1>
  </div>

  <div style="position: relative; margin: 0 auto; max-width: 50rem;">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    // Obtener los datos del servidor con PHP y MySQL
    <?php

    $conexion = mysqli_connect("localhost", "root", "", "CMIE");

    // Consulta para obtener los datos
    $consulta = "SELECT * FROM unidad WHERE unidad.division = '$id_division' ORDER BY nota DESC";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Arreglos para almacenar las etiquetas y valores
    $labels = array();
    $values = array();
    $colors = array();

    // Obtener los datos del resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {

      $labels[] = $fila['nombre'];
      $values[] = $fila['nota'];


      // Generar un color aleatorio con transparencia
      $color = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 0.7)';
      $colors[] = $color;
    }
    // Cerrar la conexión
    mysqli_close($conexion);
    ?>

    // Crear el gráfico circular con Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
          data: <?php echo json_encode($values); ?>,
          backgroundColor: <?php echo json_encode($colors); ?>,
          borderWidth: 0 // Quitar el borde del gráfico
        }]
      },

      options: {
        responsive: true,
        maintainAspectRatio: true, // Permitir que el gráfico se expanda más allá de su contenedor
        indexAxis: 'y',

        plugins: {
          legend: {
            display: false // Ocultar la leyenda
          },
          tooltip: {
            callbacks: {
              title: function (context) {
                var index = context[0].dataIndex;
                return 'Nota de la Unidad:'.$labels;
              }
            }
          }
        }
      }
    });
  </script>




</body>

</html>