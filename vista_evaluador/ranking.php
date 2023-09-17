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
      padding: 1rem;
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

    .ranking {
      display: flex;
      justify-content: center;
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 5px;
    }

    .ranking th,
    .ranking td {
      padding: 30px;
      border-bottom: 1px solid #555;
    }

    .ranking th {
      background-color: transparent;
    }

    .contenedor {
      display: flex;
    }

    .elemento {
      flex: 1;
      margin: 50px;
      padding: 20px;
      text-align: center;
    }

    /* Estilos para pantallas pequeñas (768px o menos) */
    @media (max-width: 1024px) {
      .contenedor {
        flex-direction: column;
        align-items: center;
        /* Cambia la dirección de flexión a columna */
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
  <div class="contenedor">
  <div class="ranking elemento">
    <table>
      <tr>
        <th>Posición</th>
        <th>Nombre</th>
        <th>Puntuación</th>
      </tr>
      <?php
      $conexion = mysqli_connect("localhost", "root", "", "CMIE");
      $sql = "SELECT * FROM unidad WHERE unidad.division = '$id_division' ORDER BY nota DESC";
      $result = mysqli_query($conexion, $sql);

      if ($result) {
        $posicion = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$posicion}</td>";
          echo "<td>{$row['nombre']}</td>";
          echo "<td>{$row['nota']} %</td>";
          echo "</tr>";

          // Agregar los nombres y puntuaciones a los arrays para el gráfico
          $nombres[] = $row['nombre'];
          $puntuaciones[] = $row['nota'];

          $posicion++;
        }
      }

      ?>
    </table>
  </div>


  <div class="elemento">
    <canvas id="myChart"></canvas>
  </div>
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
      $color = 'rgba(' . rand(0, 100) . ',' . rand(100, 150) . ',' . rand(0, 100) . ')';

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
<!-- 

<!DOCTYPE html>
<html>
<head>
    <title>Ranking CTF con Gráfico</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ... Tus estilos existentes ... */
        .chart-container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
        }
        .ranking {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        .ranking h2 {
            margin-bottom: 20px;
        }

        .ranking table {
            width: 100%;
            border-collapse: collapse;
        }

        .ranking th, .ranking td {
            padding: 10px;
            border-bottom: 1px solid #555;
        }

        .ranking th {
            background-color: azure;
        }
    </style>
</head>
<body>
    

    <div class="chart-container">
        <canvas id="graficoPuntuaciones"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('graficoPuntuaciones').getContext('2d');
        var data = {
            labels: <?php echo json_encode($nombres); ?>, // Usar nombres de participantes desde PHP
            datasets: [{
                label: 'Puntuación',
                data: <?php echo json_encode($puntuaciones); ?>, // Usar puntuaciones desde PHP
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>

</html> -->