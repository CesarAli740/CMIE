<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$unidad = $_SESSION['id_unidad'];
$rol = $_SESSION['rol'];
$nombre_unidad = $_SESSION['unidad'];

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
        // Encabezado del PDF
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Notas', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        // Pie de página del PDF
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }

    function ChapterTitle($title)
    {
        // Título del capítulo
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, $title, 0, 1, 'L');
        $this->Ln(4);
    }

    function ChapterBody($header, $data)
    {
        // Cuerpo del capítulo (tabla)
        $this->SetFont('Arial', 'B', 10);
        foreach ($header as $col) {
            $this->Cell(40, 10, $col, 1, 0, 'C');
        }
        $this->Ln();

        $this->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(40, 10, $col, 1, 0, 'C');
            }
            $this->Ln();
        }
        $this->Ln(4);
    }
}

// Crear objeto PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$o = 2;
while ($o < 8) {
    $sql3 = "SELECT notas_finales.personal, notas_finales.inteligencia, notas_finales.operaciones, notas_finales.logistica, notas_finales.accion_civica, notas_finales.derechos_humanos FROM notas_finales WHERE notas_finales.id_unidad = $unidad";
    $result3 = $conn->query($sql3);
    while ($row = $result3->fetch_assoc()) {
        if ($o == 2) {
            $personal = $row['personal'];
            $valor1 = $personal * 0.1666667;
        } else if ($o == 3) {
            $inteligencia = $row['inteligencia'];
            $valor2 = $inteligencia * 0.1666667;
        } else if ($o == 4) {
            $operaciones = $row['inteligencia'];
            $valor3 = $inteligencia * 0.1666667;
        } else if ($o == 5) {
            $logistica = $row['logistica'];
            $valor4 = $logistica * 0.1666667;
        } else if ($o == 6) {
            $accion_civica = $row['accion_civica'];
            $valor5 = $accion_civica * 0.1666667;
        } else if ($o == 7) {
            $derechos_humanos = $row['derechos_humanos'];
            $valor6 = $derechos_humanos * 0.1666667;
        }
    }

    $mediatotalfinal = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6;
    $mediatotalfinal = round($mediatotalfinal, 2);

    $o++;
}

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'UNIDAD EVALUADA: ' . $_SESSION['unidad'], 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 80);
$pdf->Cell(0, 10, $mediatotalfinal, 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'RESUMEN GENERAL', 0, 1, 'C');
$pdf->Ln(10);


$header = ['DIMENSIONES', 'NOTA'];
$data = [];

$sql3 = "SELECT notas_finales.personal, notas_finales.inteligencia, notas_finales.operaciones, notas_finales.logistica, notas_finales.accion_civica, notas_finales.derechos_humanos FROM notas_finales WHERE notas_finales.id_unidad = $unidad";
$result3 = $conn->query($sql3);
while ($row = $result3->fetch_assoc()) {
    $data[] = ['PERSONAL', $row['personal']];
    $data[] = ['INTELIGENCIA', $row['inteligencia']];
    $data[] = ['OPERACIONES', $row['operaciones']];
    $data[] = ['LOGISTICA', $row['logistica']];
    $data[] = ['ACC. CIVICA', $row['accion_civica']];
    $data[] = ['DERECHOS HUMANOS', $row['derechos_humanos']];
}

$pdf->ChapterBody($header, $data);

// Generar el archivo PDF
if (isset($_POST['generar_pdf'])) {
    $pdf->Output('reporte.pdf', 'I');
}

?>
