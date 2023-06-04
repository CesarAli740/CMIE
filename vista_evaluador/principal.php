<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}
$id_unidad = $_SESSION['id_unidad'];
$id = $_SESSION['id'];
$nombre_unidad = $_SESSION['unidad'];
$nombre_division = $_SESSION['division'];
$nombre_gunidad = $_SESSION['gunidad']; ?>

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
    background-color: #1B9C85;
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

<form action="../includes/_functions.php" method="POST">

    <div class="container">
       <center> <input type="hidden" id="gunidad" name="gunidad" value="<?php echo $nombre_gunidad; ?>">
        <br>

        <label for="division">División:</label><br>
        <select class="form-select" id="division" name="division" disabled>
          <option value="<?php echo $nombre_division; ?>">
            <?php echo $nombre_division; ?>
          </option>
        </select>
        <br>
        <label for="unidad">Selecciona una Unidad:</label><br>
        <select class="form-select" id="unidad" name="unidad">
          <option value="<?php echo $nombre_unidad; ?>">
            <?php echo $nombre_unidad; ?>
          </option>
        </select></center>
    </div>
  <div class="titulo">
    <h1 class="display-4">Normas y Procedimientos para la Ejecución del Control a la Gestión Estratégica</h1>
  </div>
  <div class="botones">

    <input type="hidden" id="division" name="division" value="<?php echo $nombre_division; ?>">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="accion" value="editar_registro2">
    <button class="boton" name="evaluar" onClick="window.location.href='./evaluar.php';">Evaluar</button>
    <button class="boton" name="coeficiente"
      onClick="window.location.href='./coeficiente_de_efectividad.php';">Coeficiente de
      Efectividad</button>
</form>


<script>

  var gunidadByDivision = {
    "DENOMINATIVOS ABREVIACIONES": ["DENOMINATIVO"],
    "GRANDES Y PEQUEÑAS UNIDADES": ["DIV. MEC-1.", "DIV-1.", "DIV-2.", "DIV-3.", "DIV-4.", "DIV-5.", "DIV-6.", "DIV-7.", "DIV-8.", "DIV-9.", "DIV-10."],
    "INSTITUTOS MILITARES Y PEQUEÑAS UNIDADES DEPENDIENTES DE LOS DEPARTAMENTOS DEL ESTADO MAYOR COORDINADOR": ["DPTO. II - INTELIGENCIA", "DPTO. III - OPS.", "DPTO. IV - LOG.", "DPTO. VI - EDU. - II. MM.", "DPTO. VII – PROD. Y ECO."],
    "REPARTICIONES MILITARES DEL EJÉRCITO": ["REPARTICIONES MILITARES"]
  };

  var divisionByUnidad = {
    "DENOMINATIVO": ["COMANEJTO.", "JEMGE.", "IGE.", "TPE.", "UAIE.", "AYTIA. GRAL.", "SOF. DE CMDO.", "DPTO. I – PERS.", "DPTO. II – ICIA.", "DPTO. III – OPS.", "DPTO. IV – LOG.", "DPTO. V – AC/OC Y PART. DES.", "DPTO. VI – EDU.", "DPTO. VII – PROD. Y ECOL.", "DPTO. VIII – DOC.", "DGBPIE.", "COMANCOM.", "DGPLAE.", "DGAFE.", "DGCOSE.", "DGJURE.", "CEEE.", "C5I"],
    "DIV. MEC-1.": ["BAT. C Y S - XI.", "RIM-8 AYACUCHO.", "RIM-23 MAX TOLEDO.", "RIM-30 MURILLO.", "RCB-1 CALAMA.", "RCB-2 TARAPACÁ.", "RCM-4 INGAVI.", "RCM-5 GRAL. LANZA.", "RAM-2 BOLÍVAR.", "RAAM-6 MCAL. BILBAO.", "BAT. ING. -II GRAL. ROMÁN."],
    "DIV-1.": ["BAT. C Y S - I", "RI-35 BRUNO RACUA.", "RI-36 SANTOS PARIAMO.", "BAT. ING. -VI RIOSINHO", "BAT.PM-IV SLDO. SILES."],
    "DIV-2.": ["BAT. C Y S - II.", "RI-21 ILLIMANI.", "RI-22 MEJILLONES.", "RIA-25 TOCOPILLA.", "RA-1 MY. GRAL. CAMACHO.", "BAT. ING. -VII SAJAMA."],
    "DIV-3.": ["BAT. C Y S - III", "RI-5 GRAL. CAMPERO.", "RI-20 TCNL. PADILLA.", "RC-3 AROMA.", "RA-3 PISAGUA.", "BAT. ING. - I CNL. MÉNDEZ."],
    "DIV-4.": ["BAT. C Y S - IV.", "RI-6 DR. CAMPOS.", "RI-11 BOQUERÓN.", "RC-1 CNL. AVAROA.", "RA-4 TTE. BULLAIN."],
    "DIV-5.": ["BAT. C Y S - V.", "RI-13 GRAL. MONTES.", "RI-14 FLORIDA.", "RI-15 JUNÍN.", "RC-6 CAP. CASTRILLO.", "RA-5 MY. ARTURO VERGARA PAZ.", "BAT. ING. -III GRAL. PANDO."],
    "DIV-6.": ["BAT. C Y S - VI.", "RI-17 INDEPENDENCIA", "RIS-16 TCNL. JORDÁN.", "RI-29 CAP. ECHEVERRÍA.", "RC-2 MCAL. BALLIVIAN."],
    "DIV-7.": ["BAT. C Y S - VII.", "RI-26 MCAL. AZURDUY.", "RI-2 MCAL. SUCRE.", "RIAEROTRANS - 18 VICTORIA.", "RAA -7 TUMUSLA.", "BAT. ING. -V TCNL. OVANDO", "RPM-3 GRAL. ARZE."],
    "DIV-8.": ["BAT. C Y S - VIII.", "RI-7 GRAL. MARZANA.", "RI-10 CNL. WARNES.", "RS - 2 CNL. MANCHEGO.", "RC-10 GRAL. MERCADO.", "RAA-8 TCNL. AGUIRRE.", "RPM-2 TTE. AMEZAGA."],
    "DIV-9.": ["BAT. C Y S - IX.", "RI-31 CNL. RÍOS.", "RI-32 CNL. MURGUÍA.", "RI-33 CNL. CABRERA.", "REEPPN-1 CACIQUE MARAZA."],
    "DIV-10.": ["BAT. C Y S - X.", "RI-3 GRAL. PÉREZ.", "RI-4 LOA.", "RI-27 ANTOFAGASTA.", "RC-7 CHICHAS."],
    "DPTO. II - INTELIGENCIA": ["CIE - 297", "CIE - 298", "CIE - 299", "CRTE SBTTE. GASTON VELASCO", "GECAE"],
    "DPTO. III - OPS.": ["RI-1 COLORADOS", "RPM-1 CAP. SAAVEDRA", "BAT. COM.- I CNL. VIDAURRE", "ESCONBOL.", "RS – 1 TTE. GRAL. GERMAN BUSCH", "RS – 2 CNL. MANCHEGO", "GCAE - 1 GRAL. APÓSTOL SANTIAGO", "CAE-A CNL. LÓPEZ", "SAE-B", "ECAÉ-B CHIMORE"],
    "DPTO. IV - LOG.": ["STRANSE.", "BAT. TRANS-I", "BAT. TRANS-II", "BAT. TRANS-III", "BAT. TRANS-IV", "BAT. LOG. I – HEROICAS RABONAS", "CGME.", "CGMMB-I", "CGMMB-II", "CGMMB-III", "CGMMBA-IV", "CGMMB-V", "SINTE.", "SSOE."],
    "DPTO. VI - EDU. - II. MM.": ["ECEME. MCAL. ANDRÉS DE SANTA CRUZ", "EAATE. MCAL. JOSÉ BALLIVIAN", "EMIE. GRAL. JOAQUIN ZENTENO", "EIE.", "EMI. MCAL. ANTONIO JOSÉ DE SUCRE", "EMEE. GRAL. RUFINO CARRASCO", "COL. MIL. CNL. GUALBERTO VILLARROEL", "EMSE. SGTO. MAXIMILIANO PAREDES", "EMTE. TCNL. JUAN ONDARZA", "EMME. TCNL. ADRIÁN PATINO", "ITPPE.", "ITMT.", "LIC. MIL. TTE. EDMUNDO ANDRADE", "UEE. LA PAZ", "UEE. HÉROES DEL CHACO"],
    "DPTO. VII – PROD. Y ECO.": ["BEE - I DR. MARTIN CÁRDENAS", "BPE - II CNL. OSCAR MOSCOSO", "BPE- III CNL. EDUARDO PACCIERI", "BPE - IV TTE. VÍCTOR EDUARDO", "BPE - V CNL. SANJINES", "HARASE."],
    "REPARTICIONES MILITARES": ["GCG.", "IGM.", "RAD. BATALLÓN COLORADOS", "RAD. TOPATER", "RAD. CNL. AVAROA", "RAD. TRICOLOR", "RAD. CENTINELA", "RAD. SUAREZ", "RAD. TABLADA", "RAD. BICENTENARIO", "RAD. TRICOLOR", "RAD. LITORAL"]
  };

  updateCountries(); updateCities();

  document.getElementById("gunidad").addEventListener("change", function () {
    updateCities();
  });
  function updateCountries() {
    var gunidad = document.getElementById("gunidad").value;
    var division = document.getElementById("division");

    // Agregar nuevas opciones según la región seleccionada
    if (gunidad) {
      var countries = gunidadByDivision[gunidad];
      for (var i = 0; i < countries.length; i++) {
        var option = document.createElement("option");
        option.text = countries[i];
        division.add(option);
      }
    }
  }

  function updateCities() {
    var division = document.getElementById("division").value;
    var unidad = document.getElementById("unidad");


    // Agregar nuevas opciones según el país seleccionado
    if (division) {
      var cities = divisionByUnidad[division];
      for (var i = 0; i < cities.length; i++) {
        var option = document.createElement("option");
        option.text = cities[i];
        unidad.add(option);
      }
    }
  }
</script>

</body>

</html>