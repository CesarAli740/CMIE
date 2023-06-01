<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();


}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "CMIE");
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<style>
    body {
        background-color:  #ECF8F9;
        margin-top: 1rem;
    }

    div.container {
        color: black;
    }
</style>

<body id="page-top">
    <form action="../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apPAt" class="form-label">Apellido Paterno *</label>
                                <input type="text" id="apPAt" name="apPAt" class="form-control"
                                    value="<?php echo $usuario['apPAt']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apMAt" class="form-label">Apellido Materno *</label>
                                <input type="text" id="apMAt" name="apMAt" class="form-control"
                                    value="<?php echo $usuario['apMAt']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder=""
                                    value="<?php echo $usuario['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="grado" class="form-label">Grado *</label>
                                <input type="text" id="grado" name="grado" class="form-control"
                                    value="<?php echo $usuario['grado']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control"
                                    value="<?php echo $usuario['telefono']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control"
                                    value="<?php echo $usuario['password']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number" id="rol" name="rol" class="form-control"
                                    placeholder="Escribe el rol, 1 admin, 2 lector.." required>
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div><!-- 
                            <div class="form-group">
                                <label for="gunidad" class="form-label">Gran Unidad *</label>
                                <input type="text" id="gunidad" name="gunidad" class="form-control"
                                    value="<?php echo $usuario['gunidad']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="division" class="form-label">Division *</label>
                                <input type="text" id="division" name="division" class="form-control"
                                    value="<?php echo $usuario['division']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="unidad" class="form-label">Unidad *</label>
                                <input type="text" id="unidad" name="unidad" class="form-control"
                                    value="<?php echo $usuario['unidad']; ?>" required>
                            </div><br> -->

                            


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

                                function updateCountries() {
                                    var gunidad = document.getElementById("gunidad").value;
                                    var division = document.getElementById("division");

                                    // Eliminar las opciones anteriores de la lista
                                    division.innerHTML = "";

                                    // Agregar nuevas opciones según la región seleccionada
                                    if (gunidad) {
                                        var countries = gunidadByDivision[gunidad];
                                        for (var i = 0; i < countries.length; i++) {
                                            var option = document.createElement("option");
                                            option.text = countries[i];
                                            division.add(option);
                                        }
                                    }
                                    updateCities();
                                }

                                function updateCities() {
                                    var division = document.getElementById("division").value;
                                    var unidad = document.getElementById("unidad");

                                    // Eliminar las opciones anteriores de la lista
                                    unidad.innerHTML = "";

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


                            <div class="form-group">
                                <label for="gunidad" class="form-label">Selecciona una Gran Unidad:</label>
                                <div class="container">
                                    <style>
                                        option {
                                            color: black;
                                        }

                                        button,
                                        input,
                                        optgroup,
                                        select,
                                        textarea {
                                            color: black;
                                        }

                                        .select.unidad {
                                            display: inline-block;
                                            padding: 6px 12px;
                                            margin-bottom: 0;
                                            font-size: 14px;
                                            font-weight: 400;
                                            line-height: 1.42857143;
                                            text-align: center;
                                            white-space: nowrap;
                                            vertical-align: middle;
                                            -ms-touch-action: manipulation;
                                            touch-action: manipulation;
                                            cursor: pointer;
                                            -webkit-user-select: none;
                                            -moz-user-select: none;
                                            -ms-user-select: none;
                                            user-select: none;
                                            background-image: none;
                                            border: 1px solid transparent;
                                            border-radius: 4px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-6 col-md-9">

                                            <select class="form-select" id="gunidad" onchange="updateCountries()"
                                                name="gunidad">
                                                <option value=""><?php echo $usuario['gunidad']; ?></option>
                                                <option value="DENOMINATIVOS ABREVIACIONES">ESTADO MAYOR GENERAL DEL
                                                    EJERCITO</option>
                                                <option value="GRANDES Y PEQUEÑAS UNIDADES">GRANDES Y PEQUEÑAS UNIDADES
                                                </option>
                                                <option
                                                    value="INSTITUTOS MILITARES Y PEQUEÑAS UNIDADES DEPENDIENTES DE LOS DEPARTAMENTOS DEL ESTADO MAYOR COORDINADOR">
                                                    INSTITUTOS MILITARES Y PEQUEÑAS UNIDADES DEPENDIENTES DE LOS
                                                    DEPARTAMENTOS DEL ESTADO MAYOR
                                                    COORDINADOR</option>
                                                <option value="REPARTICIONES MILITARES DEL EJÉRCITO">REPARTICIONES
                                                    MILITARES DEL EJÉRCITO
                                                </option>
                                            </select><br>

                                            <label for="division">Selecciona una Division:</label><br>
                                            <select class="form-select" id="division" onchange="updateCities()" name="division">
                                                <option value=""><?php echo $usuario['division']; ?></option>
                                            </select>
                                            <br>
                                            <label for="unidad">Selecciona una Unidad:</label><br>
                                            <select  class="form-select"id="unidad" name="unidad">
                                                <option value=""><?php echo $usuario['unidad']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="user.php" class="btn btn-danger">Cancelar</a>
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