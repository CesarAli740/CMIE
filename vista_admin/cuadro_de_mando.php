<?php include '../header.php'; ?>
<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}


?>
<style>
  body {
    background-image: url('../img/FondoMulti.svg');
  }

  h1 {
    border-radius: 5px;
    margin: 10%;
    padding: 1px;
    text-align: center;
    background-color: #e5e6c8;
  }
</style>
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
  <title>Cambiar</title>
</head>

<body>

  <div class="container is-fluid">
    <div class="col-xs-12"><br>
      <style>
        div.mision-dimension {
          display: flex;
          justify-content: space-evenly;
        }
      </style>
      <!-- <div class="mision-dimension"> --><!-- 
    <div>
      <a class="btn btn-success" href="./registrar_mision.php">Nueva mision
      <i class="fa fa-plus"></i> </a>
    </div> -->
      <!--  <div>
          <a class="btn btn-success" href="./registrar_dimension.php">Nueva Dimension
            <i class="fa fa-plus"></i> </a>
        </div>
      </div> -->
      <br>
      </form>
      <table class=" table table-responsive-sm table-striped table-dark " id="table_id">
        <thead>
          <tr>

            <col style="width:30%;" />
            <col style="width:30%;" />
            <col style="width:30%;" />
            <col style="width:10%;" />

            <th scope="col">Mision del Ejercito</th>
            <th scope="col">Mision Division</th> <!-- FFAA -->
            <th scope="col">Mision Unidad</th>
            <th scope="col">Actualizar/Eliminar</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $conexion = mysqli_connect("localhost", "root", "", "CMIE");
          $SQL = "SELECT mision.id, mision.misioneunid, mision.misionffaa, mision.misionejer FROM mision";
          $dato = mysqli_query($conexion, $SQL);

          if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

              ?>
              <tr>
                <td>
                  <?php echo $fila['misionejer']; ?>
                </td>
                <td>
                  <?php echo $fila['misionffaa']; ?>
                </td>
                <td>
                  <?php echo $fila['misioneunid']; ?>
                </td>
                <td>
                  <a class="btn btn-warning" href="./editar_mision.php?id=<?php echo $fila['id'] ?> ">
                    <i class="fas fa-edit"></i> </a>
                  <a class="btn btn-danger" href="./eliminar_mision.php?id=<?php echo $fila['id'] ?>">
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
          <!-- DIMENSIONES -->
          <div class="container is-fluid">
            <div class="col-xs-12">
              </form>
              <table class=" table table-responsive-sm table-striped table-dark " id="table_id">
                <thead>
                  <tr>
                    <th>Dimensiones</th>
                    <th>Definicion</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>PERSONAL</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>
                  <tr>
                    <td>OPERACIONES</td> 
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>
                  <tr>
                    <td>INTELIGENCIA</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>
                  <tr>
                    <td>LOGISTICA</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>
                  <tr>
                    <td>ACCION CIVICA</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>
                  <tr>
                    <td>DERECHOS HUMANOS</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quos eius laboriosam praesentium omnis odit accusamus veniam, eaque hic est optio minus iure facilis totam! Alias veniam et expedita Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem dicta alias ipsam assumenda minima illum numquam repellat iure deserunt sequi obcaecati omnis recusandae, earum officia quam! Suscipit iusto optio repudiandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consectetur, eos ab, quos unde corporis accusamus deleniti porro delectus quae magni at fuga dolor aliquid laudantium quas nemo pariatur non!</td>
                  </tr>


                  <!-- <tbody>

                <?php
                $conexion = mysqli_connect("localhost", "root", "", "CMIE");
                $SQL = "SELECT dimension.id, dimension.dimensiones, dimension.definicion FROM dimension";
                $dato = mysqli_query($conexion, $SQL);
                if ($dato->num_rows > 0) {
                  while ($fila = mysqli_fetch_array($dato)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['dimensiones']; ?>
                        </td>
                        <td>
                          <?php echo $fila['definicion']; ?>
                        </td>
                        <td>
                          <a class="btn btn-warning" href="./editar_dimension.php?id=<?php echo $fila['id'] ?> ">
                            <i class="fas fa-edit"></i> </a>
                          <a class="btn btn-danger" href="./eliminar_dimension.php?id=<?php echo $fila['id'] ?>">
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
                ?> -->
</body>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>

</html>