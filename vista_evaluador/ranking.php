<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$nombre_division = $_SESSION['division'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}

?>

<?php include '../header.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Gráfico con Radial Gradient - Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head> <br>
    

<body>
<div style="position: relative; margin: 0 auto; max-width: 30rem;">
    <canvas id="myChart"></canvas>
</div>

    <script>
    // Obtener los datos del servidor con PHP y MySQL
    <?php

    $conexion = mysqli_connect("localhost", "root", "", "CMIE");

    // Consulta para obtener los datos
    $consulta = "SELECT id_unidad, nota_final FROM notas_finales WHERE notas_finales.division = '$nombre_division'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Arreglos para almacenar las etiquetas y valores
    $labels = array();
    $values = array();
    $colors = array();

    // Obtener los datos del resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if ($fila['id_unidad'] === "1") {
            $fila['id_unidad'] = "COMANEJTO.";
          } else if ($fila['id_unidad'] === "2") {
            $fila['id_unidad'] = "JEMGE.";
          } else if ($fila['id_unidad'] === "3") {
            $fila['id_unidad'] = "IGE.";
          } else if ($fila['id_unidad'] === "4") {
            $fila['id_unidad'] = "TPE.";
          } else if ($fila['id_unidad'] === "5") {
            $fila['id_unidad'] = "UAIE.";
          } else if ($fila['id_unidad'] === "6") {
            $fila['id_unidad'] = "AYTIA. GRAL.";
          } else if ($fila['id_unidad'] === "7") {
            $fila['id_unidad'] = "SOF. DE CMDO.";
          } else if ($fila['id_unidad'] === "8") {
            $fila['id_unidad'] = "DPTO. I – PERS.";
          } else if ($fila['id_unidad'] === "9") {
            $fila['id_unidad'] = "DPTO. II – ICIA.";
          } else if ($fila['id_unidad'] === "10") {
            $fila['id_unidad'] = "DPTO. III – OPS.";
          } else if ($fila['id_unidad'] === "11") {
            $fila['id_unidad'] = "DPTO. IV – LOG.";
          } else if ($fila['id_unidad'] === "12") {
            $fila['id_unidad'] = "DPTO. V – AC/OC Y PART. DES.";
          } else if ($fila['id_unidad'] === "13") {
            $fila['id_unidad'] = "DPTO. VI – EDU.";
          } else if ($fila['id_unidad'] === "14") {
            $fila['id_unidad'] = "DPTO. VII – PROD. Y ECOL.";
          } else if ($fila['id_unidad'] === "15") {
            $fila['id_unidad'] = "DPTO. VIII – DOC.";
          } else if ($fila['id_unidad'] === "16") {
            $fila['id_unidad'] = "DGBPIE.";
          } else if ($fila['id_unidad'] === "17") {
            $fila['id_unidad'] = "COMANCOM.";
          } else if ($fila['id_unidad'] === "18") {
            $fila['id_unidad'] = "DGPLAE.";
          } else if ($fila['id_unidad'] === "19") {
            $fila['id_unidad'] = "DGAFE.";
          } else if ($fila['id_unidad'] === "20") {
            $fila['id_unidad'] = "DGCOSE.";
          } else if ($fila['id_unidad'] === "21") {
            $fila['id_unidad'] = "DGJURE.";
          } else if ($fila['id_unidad'] === "22") {
            $fila['id_unidad'] = "CEEE.";
          } else if ($fila['id_unidad'] === "23") {
            $fila['id_unidad'] = "C5I";
          } else if ($fila['id_unidad'] === "24") {
            $fila['id_unidad'] = "BAT. C Y S - XI.";
          } else if ($fila['id_unidad'] === "25") {
            $fila['id_unidad'] = "RIM-8 AYACUCHO.";
          } else if ($fila['id_unidad'] === "26") {
            $fila['id_unidad'] = "RIM-23 MAX TOLEDO.";
          } else if ($fila['id_unidad'] === "27") {
            $fila['id_unidad'] = "RIM-30 MURILLO.";
          } else if ($fila['id_unidad'] === "28") {
            $fila['id_unidad'] = "RCB-1 CALAMA.";
          } else if ($fila['id_unidad'] === "29") {
            $fila['id_unidad'] = "RCB-2 TARAPACÁ.";
          } else if ($fila['id_unidad'] === "30") {
            $fila['id_unidad'] = "RCM-4 INGAVI.";
          } else if ($fila['id_unidad'] === "31") {
            $fila['id_unidad'] = "RCM-5 GRAL. LANZA.";
          } else if ($fila['id_unidad'] === "32") {
            $fila['id_unidad'] = "RAM-2 BOLÍVAR.";
          } else if ($fila['id_unidad'] === "33") {
            $fila['id_unidad'] = "RAAM-6 MCAL. BILBAO.";
          } else if ($fila['id_unidad'] === "34") {
            $fila['id_unidad'] = "BAT. ING. -II GRAL. ROMÁN.";
          } else if ($fila['id_unidad'] === "35") {
            $fila['id_unidad'] = "BAT. C Y S - I";
          } else if ($fila['id_unidad'] === "36") {
            $fila['id_unidad'] = "RI-35 BRUNO RACUA.";
          } else if ($fila['id_unidad'] === "37") {
            $fila['id_unidad'] = "RI-36 SANTOS PARIAMO.";
          } else if ($fila['id_unidad'] === "38") {
            $fila['id_unidad'] = "BAT. ING. -VI RIOSINHO";
          } else if ($fila['id_unidad'] === "39") {
            $fila['id_unidad'] = "BAT.PM-IV SLDO. SILES.";
          } else if ($fila['id_unidad'] === "40") {
            $fila['id_unidad'] = "BAT. C Y S - II.";
          } else if ($fila['id_unidad'] === "41") {
            $fila['id_unidad'] = "RI-21 ILLIMANI.";
          } else if ($fila['id_unidad'] === "42") {
            $fila['id_unidad'] = "RI-22 MEJILLONES.";
          } else if ($fila['id_unidad'] === "43") {
            $fila['id_unidad'] = "RIA-25 TOCOPILLA.";
          } else if ($fila['id_unidad'] === "44") {
            $fila['id_unidad'] = "RA-1 MY. GRAL. CAMACHO.";
          } else if ($fila['id_unidad'] === "45") {
            $fila['id_unidad'] = "BAT. ING. -VII SAJAMA.";
          } else if ($fila['id_unidad'] === "46") {
            $fila['id_unidad'] = "BAT. C Y S - III";
          } else if ($fila['id_unidad'] === "47") {
            $fila['id_unidad'] = "RI-5 GRAL. CAMPERO.";
          } else if ($fila['id_unidad'] === "48") {
            $fila['id_unidad'] = "RI-20 TCNL. PADILLA.";
          } else if ($fila['id_unidad'] === "49") {
            $fila['id_unidad'] = "RC-3 AROMA.";
          } else if ($fila['id_unidad'] === "50") {
            $fila['id_unidad'] = "RA-3 PISAGUA.";
          } else if ($fila['id_unidad'] === "51") {
            $fila['id_unidad'] = "BAT. ING. - I CNL. MÉNDEZ.";
          } else if ($fila['id_unidad'] === "52") {
            $fila['id_unidad'] = "BAT. C Y S - IV.";
          } else if ($fila['id_unidad'] === "53") {
            $fila['id_unidad'] = "RI-11 BOQUERÓN.";
          } else if ($fila['id_unidad'] === "54.") {
            $fila['id_unidad'] = "RC-1 CNL. AVAROA.";
          } else if ($fila['id_unidad'] === "55") {
            $fila['id_unidad'] = "RA-4 TTE. BULLAIN.";
          } else if ($fila['id_unidad'] === "56") {
            $fila['id_unidad'] = "BAT. C Y S - V.";
          } else if ($fila['id_unidad'] === "57") {
            $fila['id_unidad'] = "RI-13 GRAL. MONTES.";
          } else if ($fila['id_unidad'] === "58") {
            $fila['id_unidad'] = "RI-14 FLORIDA.";
          } else if ($fila['id_unidad'] === "59") {
            $fila['id_unidad'] = "RI-15 JUNÍN.";
          } else if ($fila['id_unidad'] === "60") {
            $fila['id_unidad'] = "RC-6 CAP. CASTRILLO.";
          } else if ($fila['id_unidad'] === "61") {
            $fila['id_unidad'] = "RA-5 MY. ARTURO VERGARA PAZ.";
          } else if ($fila['id_unidad'] === "62") {
            $fila['id_unidad'] = "BAT. ING. -III GRAL. PANDO.";
          } else if ($fila['id_unidad'] === "63") {
            $fila['id_unidad'] = "BAT. C Y S - VI.";
          } else if ($fila['id_unidad'] === "64") {
            $fila['id_unidad'] = "RI-17 INDEPENDENCIA";
          } else if ($fila['id_unidad'] === "65") {
            $fila['id_unidad'] = "RIS-16 TCNL. JORDÁN.";
          } else if ($fila['id_unidad'] === "66") {
            $fila['id_unidad'] = "RI-29 CAP. ECHEVERRÍA.";
          } else if ($fila['id_unidad'] === "67") {
            $fila['id_unidad'] = "RC-2 MCAL. BALLIVIAN.";
          } else if ($fila['id_unidad'] === "68") {
            $fila['id_unidad'] = "BAT. C Y S - VII.";
          } else if ($fila['id_unidad'] === "69") {
            $fila['id_unidad'] = "RI-26 MCAL. AZURDUY.";
          } else if ($fila['id_unidad'] === "70") {
            $fila['id_unidad'] = "RI-2 MCAL. SUCRE.";
          } else if ($fila['id_unidad'] === "71") {
            $fila['id_unidad'] = "RIAEROTRANS - 18 VICTORIA.";
          } else if ($fila['id_unidad'] === "72") {
            $fila['id_unidad'] = "RAA -7 TUMUSLA.";
          } else if ($fila['id_unidad'] === "73") {
            $fila['id_unidad'] = "BAT. ING. -V TCNL. OVANDO";
          } else if ($fila['id_unidad'] === "74") {
            $fila['id_unidad'] = "RPM-3 GRAL. ARZE.";
          } else if ($fila['id_unidad'] === "75") {
            $fila['id_unidad'] = "BAT. C Y S - VIII.";
          } else if ($fila['id_unidad'] === "76") {
            $fila['id_unidad'] = "RI-7 GRAL. MARZANA.";
          } else if ($fila['id_unidad'] === "77") {
            $fila['id_unidad'] = "RI-10 CNL. WARNES.";
          } else if ($fila['id_unidad'] === "78") {
            $fila['id_unidad'] = "RS - 2 CNL. MANCHEGO.";
          } else if ($fila['id_unidad'] === "79") {
            $fila['id_unidad'] = "RC-10 GRAL. MERCADO.";
          } else if ($fila['id_unidad'] === "80") {
            $fila['id_unidad'] = "RAA-8 TCNL. AGUIRRE.";
          } else if ($fila['id_unidad'] === "81") {
            $fila['id_unidad'] = "RPM-2 TTE. AMEZAGA.";
          } else if ($fila['id_unidad'] === "82") {
            $fila['id_unidad'] = "BAT. C Y S - IX.";
          } else if ($fila['id_unidad'] === "83") {
            $fila['id_unidad'] = "RI-31 CNL. RÍOS.";
          } else if ($fila['id_unidad'] === "84") {
            $fila['id_unidad'] = "RI-32 CNL. MURGUÍA.";
          } else if ($fila['id_unidad'] === "85") {
            $fila['id_unidad'] = "RI-33 CNL. CABRERA.";
          } else if ($fila['id_unidad'] === "86") {
            $fila['id_unidad'] = "REEPPN-1 CACIQUE MARAZA.";
          } else if ($fila['id_unidad'] === "87") {
            $fila['id_unidad'] = "BAT. C Y S - X.";
          } else if ($fila['id_unidad'] === "88") {
            $fila['id_unidad'] = "RI-3 GRAL. PÉREZ.";
          } else if ($fila['id_unidad'] === "89") {
            $fila['id_unidad'] = "RI-4 LOA.";
          } else if ($fila['id_unidad'] === "90") {
            $fila['id_unidad'] = "RI-27 ANTOFAGASTA.";
          } else if ($fila['id_unidad'] === "91") {
            $fila['id_unidad'] = "RC-7 CHICHAS.";
          } else if ($fila['id_unidad'] === "92") {
            $fila['id_unidad'] = "CIE - 297";
          } else if ($fila['id_unidad'] === "93") {
            $fila['id_unidad'] = "CIE - 298";
          } else if ($fila['id_unidad'] === "94") {
            $fila['id_unidad'] = "CIE - 299";
          } else if ($fila['id_unidad'] === "95") {
            $fila['id_unidad'] = "CRTE SBTTE. GASTON VELASCO";
          } else if ($fila['id_unidad'] === "96") {
            $fila['id_unidad'] = "RI-1 COLORADOS";
          } else if ($fila['id_unidad'] === "97") {
            $fila['id_unidad'] = "RPM-1 CAP. SAAVEDRA";
          } else if ($fila['id_unidad'] === "98") {
            $fila['id_unidad'] = "BAT. COM.- I CNL. VIDAURRE";
          } else if ($fila['id_unidad'] === "99") {
            $fila['id_unidad'] = "ESCONBOL.";
          } else if ($fila['id_unidad'] === "100") {
            $fila['id_unidad'] = "RS – 1 TTE. GRAL. GERMAN BUSCH";
          } else if ($fila['id_unidad'] === "101") {
            $fila['id_unidad'] = "RS – 2 CNL. MANCHEGO";
          } else if ($fila['id_unidad'] === "102") {
            $fila['id_unidad'] = "GCAE - 1 GRAL. APÓSTOL SANTIAGO";
          } else if ($fila['id_unidad'] === "103") {
            $fila['id_unidad'] = "CAE-A CNL. LÓPEZ";
          } else if ($fila['id_unidad'] === "104") {
            $fila['id_unidad'] = "SAE-B";
          } else if ($fila['id_unidad'] === "105") {
            $fila['id_unidad'] = "ECAÉ-B CHIMORE";
          } else if ($fila['id_unidad'] === "106") {
            $fila['id_unidad'] = "STRANSE.";
          } else if ($fila['id_unidad'] === "107") {
            $fila['id_unidad'] = "BAT. TRANS-I";
          } else if ($fila['id_unidad'] === "108") {
            $fila['id_unidad'] = "BAT. TRANS-II";
          } else if ($fila['id_unidad'] === "109") {
            $fila['id_unidad'] = "BAT. TRANS-III";
          } else if ($fila['id_unidad'] === "110") {
            $fila['id_unidad'] = "BAT. TRANS-IV";
          } else if ($fila['id_unidad'] === "111") {
            $fila['id_unidad'] = "BAT. LOG. I – HEROICAS RABONAS";
          } else if ($fila['id_unidad'] === "112") {
            $fila['id_unidad'] = "CGME.";
          } else if ($fila['id_unidad'] === "113") {
            $fila['id_unidad'] = "CGMMB-I";
          } else if ($fila['id_unidad'] === "114") {
            $fila['id_unidad'] = "CGMMB-II";
          } else if ($fila['id_unidad'] === "115") {
            $fila['id_unidad'] = "CGMMB-III";
          } else if ($fila['id_unidad'] === "116") {
            $fila['id_unidad'] = "CGMMBA-IV";
          } else if ($fila['id_unidad'] === "117") {
            $fila['id_unidad'] = "CGMMB-V";
          } else if ($fila['id_unidad'] === "118") {
            $fila['id_unidad'] = "SINTE.";
          } else if ($fila['id_unidad'] === "119") {
            $fila['id_unidad'] = "SSOE.";
          } else if ($fila['id_unidad'] === "120") {
            $fila['id_unidad'] = "ECEME. MCAL. ANDRÉS DE SANTA CRUZ";
          } else if ($fila['id_unidad'] === "121") {
            $fila['id_unidad'] = "EAATE. MCAL. JOSÉ BALLIVIAN";
          } else if ($fila['id_unidad'] === "122") {
            $fila['id_unidad'] = "EMIE. GRAL. JOAQUIN ZENTENO";
          } else if ($fila['id_unidad'] === "123") {
            $fila['id_unidad'] = "EIE.";
          } else if ($fila['id_unidad'] === "124") {
            $fila['id_unidad'] = "EMI. MCAL. ANTONIO JOSÉ DE SUCRE";
          } else if ($fila['id_unidad'] === "125") {
            $fila['id_unidad'] = "EMEE. GRAL. RUFINO CARRASCO";
          } else if ($fila['id_unidad'] === "126") {
            $fila['id_unidad'] = "COL. MIL. CNL. GUALBERTO VILLARROEL";
          } else if ($fila['id_unidad'] === "127") {
            $fila['id_unidad'] = "EMSE. SGTO. MAXIMILIANO PAREDES";
          } else if ($fila['id_unidad'] === "128") {
            $fila['id_unidad'] = "EMTE. TCNL. JUAN ONDARZA";
          } else if ($fila['id_unidad'] === "129") {
            $fila['id_unidad'] = "EMME. TCNL. ADRIÁN PATINO";
          } else if ($fila['id_unidad'] === "130") {
            $fila['id_unidad'] = "ITPPE.";
          } else if ($fila['id_unidad'] === "131") {
            $fila['id_unidad'] = "ITMT.";
          } else if ($fila['id_unidad'] === "132") {
            $fila['id_unidad'] = "LIC. MIL. TTE. EDMUNDO ANDRADE";
          } else if ($fila['id_unidad'] === "133") {
            $fila['id_unidad'] = "UEE. LA PAZ";
          } else if ($fila['id_unidad'] === "134") {
            $fila['id_unidad'] = "UEE. HÉROES DEL CHACO";
          } else if ($fila['id_unidad'] === "135") {
            $fila['id_unidad'] = "BEE - I DR. MARTIN CÁRDENAS";
          } else if ($fila['id_unidad'] === "136") {
            $fila['id_unidad'] = "BPE - II CNL. OSCAR MOSCOSO";
          } else if ($fila['id_unidad'] === "137") {
            $fila['id_unidad'] = "BPE- III CNL. EDUARDO PACCIERI";
          } else if ($fila['id_unidad'] === "138") {
            $fila['id_unidad'] = "BPE - IV TTE. VÍCTOR EDUARDO";
          } else if ($fila['id_unidad'] === "139") {
            $fila['id_unidad'] = "BPE - V CNL. SANJINES";
          } else if ($fila['id_unidad'] === "140") {
            $fila['id_unidad'] = "HARASE.";
          } else if ($fila['id_unidad'] === "141") {
            $fila['id_unidad'] = "GCG.";
          } else if ($fila['id_unidad'] === "142") {
            $fila['id_unidad'] = "IGM.";
          } else if ($fila['id_unidad'] === "143") {
            $fila['id_unidad'] = "RAD. BATALLÓN COLORADOS";
          } else if ($fila['id_unidad'] === "144") {
            $fila['id_unidad'] = "RAD. TOPATER";
          } else if ($fila['id_unidad'] === "145") {
            $fila['id_unidad'] = "RAD. CNL. AVAROA";
          } else if ($fila['id_unidad'] === "146") {
            $fila['id_unidad'] = "RAD. TRICOLOR";
          } else if ($fila['id_unidad'] === "147") {
            $fila['id_unidad'] = "RAD. CENTINELA";
          } else if ($fila['id_unidad'] === "148") {
            $fila['id_unidad'] = "RAD. SUAREZ";
          } else if ($fila['id_unidad'] === "149") {
            $fila['id_unidad'] = "RAD. TABLADA";
          } else if ($fila['id_unidad'] === "150") {
            $fila['id_unidad'] = "RAD. BICENTENARIO";
          } else if ($fila['id_unidad'] === "151") {
            $fila['id_unidad'] = "RAD. TRICOLOR";
          } else if ($fila['id_unidad'] === "152") {
            $fila['id_unidad'] = "RAD. LITORAL";
          } else if ($fila['id_unidad'] === "153") {
            $fila['id_unidad'] = "RI-6 DR. CAMPOS.";
          }
        $labels[] = $fila['id_unidad'];
        $values[] = $fila['nota_final'];



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
        type: 'polarArea',
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
            plugins: {
                legend: {
                    display: false // Ocultar la leyenda
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        title: function (context) {
                            var index = context[0].dataIndex;
                            return 'Nota de la Unidad:';
                        }
                    }
                }
            }
        }
    });
</script>




</body>

</html>