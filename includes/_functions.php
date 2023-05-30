<?php

require_once("_db.php");




if (isset($_POST['accion'])) {
  switch ($_POST['accion']) {
    //casos de registros
    case 'editar_registro':
      editar_registro();
      break;

    case 'eliminar_registro';
      eliminar_registro();

      break;

    case 'acceso_user';
      acceso_user();
      break;


  }

}

function editar_registro()
{
  $conexion = mysqli_connect("localhost", "root", "", "CMIE");
  extract($_POST);
  $id_unidad = '';
  if ($unidad === "COMANEJTO.") {
    $id_unidad = "1";
  } else if ($unidad === "JEMGE.") {
    $id_unidad = "2";
  } else if ($unidad === "IGE.") {
    $id_unidad = "3";
  } else if ($unidad === "TPE.") {
    $id_unidad = "4";
  } else if ($unidad === "UAIE.") {
    $id_unidad = "5";
  } else if ($unidad === "AYTIA. GRAL.") {
    $id_unidad = "6";
  } else if ($unidad === "SOF. DE CMDO.") {
    $id_unidad = "7";
  } else if ($unidad === "DPTO. I – PERS.") {
    $id_unidad = "8";
  } else if ($unidad === "DPTO. II – ICIA.") {
    $id_unidad = "9";
  } else if ($unidad === "DPTO. III – OPS.") {
    $id_unidad = "10";
  } else if ($unidad === "DPTO. IV – LOG.") {
    $id_unidad = "11";
  } else if ($unidad === "DPTO. V – AC/OC Y PART. DES.") {
    $id_unidad = "12";
  } else if ($unidad === "DPTO. VI – EDU.") {
    $id_unidad = "13";
  } else if ($unidad === "DPTO. VII – PROD. Y ECOL.") {
    $id_unidad = "14";
  } else if ($unidad === "DPTO. VIII – DOC.") {
    $id_unidad = "15";
  } else if ($unidad === "DGBPIE.") {
    $id_unidad = "16";
  } else if ($unidad === "COMANCOM.") {
    $id_unidad = "17";
  } else if ($unidad === "DGPLAE.") {
    $id_unidad = "18";
  } else if ($unidad === "DGAFE.") {
    $id_unidad = "19";
  } else if ($unidad === "DGCOSE.") {
    $id_unidad = "20";
  } else if ($unidad === "DGJURE.") {
    $id_unidad = "21";
  } else if ($unidad === "CEEE.") {
    $id_unidad = "22";
  } else if ($unidad === "C5I") {
    $id_unidad = "23";
  } else if ($unidad === "BAT. C Y S - XI.") {
    $id_unidad = "24";
  } else if ($unidad === "RIM-8 AYACUCHO.") {
    $id_unidad = "25";
  } else if ($unidad === "RIM-23 MAX TOLEDO.") {
    $id_unidad = "26";
  } else if ($unidad === "RIM-30 MURILLO.") {
    $id_unidad = "27";
  } else if ($unidad === "RCB-1 CALAMA.") {
    $id_unidad = "28";
  } else if ($unidad === "RCB-2 TARAPACÁ.") {
    $id_unidad = "29";
  } else if ($unidad === "RCM-4 INGAVI.") {
    $id_unidad = "30";
  } else if ($unidad === "RCM-5 GRAL. LANZA.") {
    $id_unidad = "31";
  } else if ($unidad === "RAM-2 BOLÍVAR.") {
    $id_unidad = "32";
  } else if ($unidad === "RAAM-6 MCAL. BILBAO.") {
    $id_unidad = "33";
  } else if ($unidad === "BAT. ING. -II GRAL. ROMÁN.") {
    $id_unidad = "34";
  } else if ($unidad === "BAT. C Y S - I") {
    $id_unidad = "35";
  } else if ($unidad === "RI-35 BRUNO RACUA.") {
    $id_unidad = "36";
  } else if ($unidad === "RI-36 SANTOS PARIAMO.") {
    $id_unidad = "37";
  } else if ($unidad === "BAT. ING. -VI RIOSINHO") {
    $id_unidad = "38";
  } else if ($unidad === "BAT.PM-IV SLDO. SILES.") {
    $id_unidad = "39";
  } else if ($unidad === "BAT. C Y S - II.") {
    $id_unidad = "40";
  } else if ($unidad === "RI-21 ILLIMANI.") {
    $id_unidad = "41";
  } else if ($unidad === "RI-22 MEJILLONES.") {
    $id_unidad = "42";
  } else if ($unidad === "RIA-25 TOCOPILLA.") {
    $id_unidad = "43";
  } else if ($unidad === "RA-1 MY. GRAL. CAMACHO.") {
    $id_unidad = "44";
  } else if ($unidad === "BAT. ING. -VII SAJAMA.") {
    $id_unidad = "45";
  } else if ($unidad === "BAT. C Y S - III") {
    $id_unidad = "46";
  } else if ($unidad === "RI-5 GRAL. CAMPERO.") {
    $id_unidad = "47";
  } else if ($unidad === "RI-20 TCNL. PADILLA.") {
    $id_unidad = "48";
  } else if ($unidad === "RC-3 AROMA.") {
    $id_unidad = "49";
  } else if ($unidad === "RA-3 PISAGUA.") {
    $id_unidad = "50";
  } else if ($unidad === "BAT. ING. - I CNL. MÉNDEZ.") {
    $id_unidad = "51";
  } else if ($unidad === "BAT. C Y S - IV.") {
    $id_unidad = "52";
  } else if ($unidad === "RI-11 BOQUERÓN.") {
    $id_unidad = "53";
  } else if ($unidad === "RC-1 CNL. AVAROA.") {
    $id_unidad = "54";
  } else if ($unidad === "RA-4 TTE. BULLAIN.") {
    $id_unidad = "55";
  } else if ($unidad === "BAT. C Y S - V.") {
    $id_unidad = "56";
  } else if ($unidad === "RI-13 GRAL. MONTES.") {
    $id_unidad = "57";
  } else if ($unidad === "RI-14 FLORIDA.") {
    $id_unidad = "58";
  } else if ($unidad === "RI-15 JUNÍN.") {
    $id_unidad = "59";
  } else if ($unidad === "RC-6 CAP. CASTRILLO.") {
    $id_unidad = "60";
  } else if ($unidad === "RA-5 MY. ARTURO VERGARA PAZ.") {
    $id_unidad = "61";
  } else if ($unidad === "BAT. ING. -III GRAL. PANDO.") {
    $id_unidad = "62";
  } else if ($unidad === "BAT. C Y S - VI.") {
    $id_unidad = "63";
  } else if ($unidad === "RI-17 INDEPENDENCIA") {
    $id_unidad = "64";
  } else if ($unidad === "RIS-16 TCNL. JORDÁN.") {
    $id_unidad = "65";
  } else if ($unidad === "RI-29 CAP. ECHEVERRÍA.") {
    $id_unidad = "66";
  } else if ($unidad === "RC-2 MCAL. BALLIVIAN.") {
    $id_unidad = "67";
  } else if ($unidad === "BAT. C Y S - VII.") {
    $id_unidad = "68";
  } else if ($unidad === "RI-26 MCAL. AZURDUY.") {
    $id_unidad = "69";
  } else if ($unidad === "RI-2 MCAL. SUCRE.") {
    $id_unidad = "70";
  } else if ($unidad === "RIAEROTRANS - 18 VICTORIA.") {
    $id_unidad = "71";
  } else if ($unidad === "RAA -7 TUMUSLA.") {
    $id_unidad = "72";
  } else if ($unidad === "BAT. ING. -V TCNL. OVANDO") {
    $id_unidad = "73";
  } else if ($unidad === "RPM-3 GRAL. ARZE.") {
    $id_unidad = "74";
  } else if ($unidad === "BAT. C Y S - VIII.") {
    $id_unidad = "75";
  } else if ($unidad === "RI-7 GRAL. MARZANA.") {
    $id_unidad = "76";
  } else if ($unidad === "RI-10 CNL. WARNES.") {
    $id_unidad = "77";
  } else if ($unidad === "RS - 2 CNL. MANCHEGO.") {
    $id_unidad = "78";
  } else if ($unidad === "RC-10 GRAL. MERCADO.") {
    $id_unidad = "79";
  } else if ($unidad === "RAA-8 TCNL. AGUIRRE.") {
    $id_unidad = "80";
  } else if ($unidad === "RPM-2 TTE. AMEZAGA.") {
    $id_unidad = "81";
  } else if ($unidad === "BAT. C Y S - IX.") {
    $id_unidad = "82";
  } else if ($unidad === "RI-31 CNL. RÍOS.") {
    $id_unidad = "83";
  } else if ($unidad === "RI-32 CNL. MURGUÍA.") {
    $id_unidad = "84";
  } else if ($unidad === "RI-33 CNL. CABRERA.") {
    $id_unidad = "85";
  } else if ($unidad === "REEPPN-1 CACIQUE MARAZA.") {
    $id_unidad = "86";
  } else if ($unidad === "BAT. C Y S - X.") {
    $id_unidad = "87";
  } else if ($unidad === "RI-3 GRAL. PÉREZ.") {
    $id_unidad = "88";
  } else if ($unidad === "RI-4 LOA.") {
    $id_unidad = "89";
  } else if ($unidad === "RI-27 ANTOFAGASTA.") {
    $id_unidad = "90";
  } else if ($unidad === "RC-7 CHICHAS.") {
    $id_unidad = "91";
  } else if ($unidad === "CIE - 297") {
    $id_unidad = "92";
  } else if ($unidad === "CIE - 298") {
    $id_unidad = "93";
  } else if ($unidad === "CIE - 299") {
    $id_unidad = "94";
  } else if ($unidad === "CRTE SBTTE. GASTON VELASCO") {
    $id_unidad = "95";
  } else if ($unidad === "RI-1 COLORADOS") {
    $id_unidad = "96";
  } else if ($unidad === "RPM-1 CAP. SAAVEDRA") {
    $id_unidad = "97";
  } else if ($unidad === "BAT. COM.- I CNL. VIDAURRE") {
    $id_unidad = "98";
  } else if ($unidad === "ESCONBOL.") {
    $id_unidad = "99";
  } else if ($unidad === "RS – 1 TTE. GRAL. GERMAN BUSCH") {
    $id_unidad = "100";
  } else if ($unidad === "RS – 2 CNL. MANCHEGO") {
    $id_unidad = "101";
  } else if ($unidad === "GCAE - 1 GRAL. APÓSTOL SANTIAGO") {
    $id_unidad = "102";
  } else if ($unidad === "CAE-A CNL. LÓPEZ") {
    $id_unidad = "103";
  } else if ($unidad === "SAE-B") {
    $id_unidad = "104";
  } else if ($unidad === "ECAÉ-B CHIMORE") {
    $id_unidad = "105";
  } else if ($unidad === "STRANSE.") {
    $id_unidad = "106";
  } else if ($unidad === "BAT. TRANS-I") {
    $id_unidad = "107";
  } else if ($unidad === "BAT. TRANS-II") {
    $id_unidad = "108";
  } else if ($unidad === "BAT. TRANS-III") {
    $id_unidad = "109";
  } else if ($unidad === "BAT. TRANS-IV") {
    $id_unidad = "110";
  } else if ($unidad === "BAT. LOG. I – HEROICAS RABONAS") {
    $id_unidad = "111";
  } else if ($unidad === "CGME.") {
    $id_unidad = "112";
  } else if ($unidad === "CGMMB-I") {
    $id_unidad = "113";
  } else if ($unidad === "CGMMB-II") {
    $id_unidad = "114";
  } else if ($unidad === "CGMMB-III") {
    $id_unidad = "115";
  } else if ($unidad === "CGMMBA-IV") {
    $id_unidad = "116";
  } else if ($unidad === "CGMMB-V") {
    $id_unidad = "117";
  } else if ($unidad === "SINTE.") {
    $id_unidad = "118";
  } else if ($unidad === "SSOE.") {
    $id_unidad = "119";
  } else if ($unidad === "ECEME. MCAL. ANDRÉS DE SANTA CRUZ") {
    $id_unidad = "120";
  } else if ($unidad === "EAATE. MCAL. JOSÉ BALLIVIAN") {
    $id_unidad = "121";
  } else if ($unidad === "EMIE. GRAL. JOAQUIN ZENTENO") {
    $id_unidad = "122";
  } else if ($unidad === "EIE.") {
    $id_unidad = "123";
  } else if ($unidad === "EMI. MCAL. ANTONIO JOSÉ DE SUCRE") {
    $id_unidad = "124";
  } else if ($unidad === "EMEE. GRAL. RUFINO CARRASCO") {
    $id_unidad = "125";
  } else if ($unidad === "COL. MIL. CNL. GUALBERTO VILLARROEL") {
    $id_unidad = "126";
  } else if ($unidad === "EMSE. SGTO. MAXIMILIANO PAREDES") {
    $id_unidad = "127";
  } else if ($unidad === "EMTE. TCNL. JUAN ONDARZA") {
    $id_unidad = "128";
  } else if ($unidad === "EMME. TCNL. ADRIÁN PATINO") {
    $id_unidad = "129";
  } else if ($unidad === "ITPPE.") {
    $id_unidad = "130";
  } else if ($unidad === "ITMT.") {
    $id_unidad = "131";
  } else if ($unidad === "LIC. MIL. TTE. EDMUNDO ANDRADE") {
    $id_unidad = "132";
  } else if ($unidad === "UEE. LA PAZ") {
    $id_unidad = "133";
  } else if ($unidad === "UEE. HÉROES DEL CHACO") {
    $id_unidad = "134";
  } else if ($unidad === "BEE - I DR. MARTIN CÁRDENAS") {
    $id_unidad = "135";
  } else if ($unidad === "BPE - II CNL. OSCAR MOSCOSO") {
    $id_unidad = "136";
  } else if ($unidad === "BPE- III CNL. EDUARDO PACCIERI") {
    $id_unidad = "137";
  } else if ($unidad === "BPE - IV TTE. VÍCTOR EDUARDO") {
    $id_unidad = "138";
  } else if ($unidad === "BPE - V CNL. SANJINES") {
    $id_unidad = "139";
  } else if ($unidad === "HARASE.") {
    $id_unidad = "140";
  } else if ($unidad === "GCG.") {
    $id_unidad = "141";
  } else if ($unidad === "IGM.") {
    $id_unidad = "142";
  } else if ($unidad === "RAD. BATALLÓN COLORADOS") {
    $id_unidad = "143";
  } else if ($unidad === "RAD. TOPATER") {
    $id_unidad = "144";
  } else if ($unidad === "RAD. CNL. AVAROA") {
    $id_unidad = "145";
  } else if ($unidad === "RAD. TRICOLOR") {
    $id_unidad = "146";
  } else if ($unidad === "RAD. CENTINELA") {
    $id_unidad = "147";
  } else if ($unidad === "RAD. SUAREZ") {
    $id_unidad = "148";
  } else if ($unidad === "RAD. TABLADA") {
    $id_unidad = "149";
  } else if ($unidad === "RAD. BICENTENARIO") {
    $id_unidad = "150";
  } else if ($unidad === "RAD. TRICOLOR") {
    $id_unidad = "151";
  } else if ($unidad === "RAD. LITORAL") {
    $id_unidad = "152";
  } else if ($unidad === "RI-6 DR. CAMPOS.") {
    $id_unidad = "153";
  }
  $consulta = "UPDATE user SET nombre = '$nombre', apPAt = '$apPAt', apMAt = '$apMAt', correo = '$correo', grado = '$grado', telefono = '$telefono',
		password ='$password', rol = '$rol', gunidad = '$gunidad', division = '$division', unidad = '$unidad', id_unidad = '$id_unidad' WHERE id = '$id' ";

  mysqli_query($conexion, $consulta);


  header('Location: ../views/user.php');

}

function eliminar_registro()
{
  $conexion = mysqli_connect("localhost", "root", "", "CMIE");
  extract($_POST);
  $id = $_POST['id'];
  $consulta = "DELETE FROM user WHERE id= $id";

  mysqli_query($conexion, $consulta);


  header('Location: ../views/user.php');

}

function acceso_user()
{
  $nombre = $_POST['nombre'];
  $password = $_POST['password'];
  session_start();
  $_SESSION['nombre'] = $nombre;

  $conexion = mysqli_connect("localhost", "root", "", "CMIE");
  $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
  $resultado = mysqli_query($conexion, $consulta);
  $filas = mysqli_fetch_array($resultado);
  
  $_SESSION['id_unidad'] = $filas['id_unidad'];
  $_SESSION['rol'] = $filas['rol'];
  $_SESSION['unidad'] = $filas['unidad'];

  if ($filas['rol'] == 1) { //admin

    header("Location: ../vista_admin/principal.php");

  } else if ($filas['rol'] == 2 or $filas['rol'] == 3 or $filas['rol'] == 4 or $filas['rol'] == 5 or $filas['rol'] == 6 or $filas['rol'] == 7 ) { //evaluadores

    header("Location: ../vista_admin/principal.php");

  } else {

    header('Location: login.php');
    session_destroy();

  }


}


?>