<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_POST['id_unidad'];
$rol = $_SESSION['rol'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}

?>
<?php
require('../fpdf185/fpdf.php');

$conn = mysqli_connect("localhost", "root", "", "CMIE");
class PDF extends FPDF
{

    function Header()
    {
        // Logo o título del documento

        /* $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Cuadro de Mando Integral del Ejercito', 0, 1, 'C'); */
    }

    // Pie de página
/* function Footer() {
// Número de página
$this->SetY(-15);
$this->SetFont('Arial', 'I', 8);
$this->Cell(0, 10, ' ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
} */
}
// Crear un nuevo PDF
$pdf = new PDF();
$pdf->AliasNbPages(); // Establecer el número total de páginas

// Agregar una página
$pdf->AddPage();

// Contenido del PDF
$pdf->SetFont('Arial', '', 12);

$query = "SELECT * FROM unidad WHERE unidad.id = $unidad;";
$resultado = mysqli_query($conn, $query);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(0, 10, 'UNIDAD EVALUADA:', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, $fila['nombre'], 0, 1, 'C');
}


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'NOTA FINAL', 0, 1, 'C');

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 80);
$conn = mysqli_connect("localhost", "root", "", "CMIE");
$query = "SELECT * FROM unidad WHERE unidad.id = $unidad;";
$resultado = mysqli_query($conn, $query);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(0, 10, $fila['nota'], 0, 1, 'C');
}

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'RESUMEN GENERAL', 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 15, 'DIMENSIONES', 1, 0, 'C'); // Ancho ajustado a 110
$pdf->Cell(40, 15, 'PONDERACION', 1, 0, 'C'); // Ancho ajustado a 110
$pdf->Cell(30, 15, 'NOTA', 1, 0, 'C');
$pdf->Cell(60, 15, 'NOMBRE Y FIRMA', 1, 1, 'C');

$conc = 'c' . $unidad;
$conn = mysqli_connect("localhost", "root", "", "CMIE");
$query = "SELECT * FROM dimensiones";
$resultado = mysqli_query($conn, $query);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(60, 15, '  ' . $fila['dimension'], 1, 0, 'L'); // Ancho ajustado a 110
    $pdf->Cell(40, 15,  $fila['ponderacion']*100 . '%', 1, 0, 'C');
    $numeroRedondeado = round($fila[$conc]);
    $pdf->Cell(30, 15, $numeroRedondeado.'/100', 1, 0, 'C');
    $pdf->Cell(60, 15, '', 1, 1, 'C');
}
$pdf->Ln(30);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Ln(10); // Salto de línea
$pdf->Cell(0, 2, '....................................................', 0, 1, 'C');
$pdf->Cell(0, 8, 'SELLO Y FIRMA', 0, 1, 'C');
$pdf->Cell(0, 1, 'RESPONSABLE', 0, 1, 'C');

// Generar el archivo PDF
if (isset($_POST['generar_pdf'])) {
    $pdf->Output('reporte.pdf', 'I');
}


?>