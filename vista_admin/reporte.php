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
    
    $mediafinal_array = array(); // Arreglo para almacenar los valores de $mediafinal
    $o = 2;
                while ($o < 8) {
                    $conn = mysqli_connect("localhost", "root", "", "CMIE");
    $sql = "SELECT AVG(nota) AS media FROM unidadejer WHERE unidadejer.id_factores = $unidad AND unidadejer.rol = $o AND unidadejer.tipo = 1";
    $result = $conn->query($sql);
    $query = "SELECT AVG(nota) AS media FROM unidadejer WHERE unidadejer.id_factores = $unidad AND unidadejer.rol = $o AND unidadejer.tipo = 2";
    $resultado = $conn->query($query);

    if ($result->num_rows > 0 and $resultado->num_rows > 0) {
        // Obtener el valor de la media
        $row = $result->fetch_assoc();
        $media = $row["media"];
        $media = round($media, 2);

        $row2 = $resultado->fetch_assoc();
        $media2 = $row2["media"];
        $media2 = round($media2, 2);

        $mediafinal = ($media + $media2) / 2;

        $mediafinal_array[] = $mediafinal; // Agregar $mediafinal al arreglo
        
        $valor1 = $mediafinal_array[0] * 0.2;
        $valor2 = $mediafinal_array[1] * 0.15;
        $valor3 = $mediafinal_array[2] * 0.2;
        $valor4 = $mediafinal_array[3] * 0.2;
        $valor5 = $mediafinal_array[4] * 0.1;
        $valor6 = $mediafinal_array[5] * 0.15;
        $mediatotalfinal = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6;
        $mediatotalfinal = round($mediatotalfinal, 2);
    
        ?>
        <?php
    } else {
        echo "No se encontraron resultados.";
    }
                $o++; }
                
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Título del reporte
$pdf->ChapterTitle('NOTA FINAL');

// Contenido de la nota final
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 10, 'UNIDAD EVALUADA: ' . $_SESSION['unidad'], 0, 1, 'C');
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 40);
$pdf->Cell(0, 20, $mediatotalfinal, 0, 1, 'C');
$pdf->Ln(10);

// Tabla de resumen general
$pdf->ChapterTitle('RESUMEN GENERAL');

$header = array('DIMENSIONES', 'NOTA');
$data = array();
$c = 2;
while ($c < 8) {
    $dimen = '';
    if ($c == 2) {
        $dimen = 'PERSONAL';
    } else if ($c == 3) {
        $dimen = 'INTELIGENCIA';
    } else if ($c == 4) {
        $dimen = 'OPERACIONES';
    } else if ($c == 5) {
        $dimen = 'LOGISTICA';
    } else if ($c == 6) {
        $dimen = 'ACC. CIVICA';
    } else if ($c == 7) {
        $dimen = 'DERECHOS HUMANOS';
    }

    $nota = $mediafinal_array[$c - 2];

    $data[] = array($dimen, $nota);
    $c++;
}

$pdf->ChapterBody($header, $data);

// Generar el PDF al hacer clic en el botón
if (isset($_POST['generar_pdf'])) {
    $pdf->Output();
}
?>

<body>
    <div class="container">
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <center>NOTA FINAL</center>
                    </th>
                </tr>
                <tr>
                    <td>
                        <center>
                            UNIDAD EVALUADA:
                            <?php echo $_SESSION['unidad']; ?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <style>
                                .nota_final {
                                    font-size: 80px;
                                }
                            </style>
                            <a class="nota_final">
                                <?php echo $mediatotalfinal; ?>
                            </a>
                        </center>
                    </td>
                </tr>
            </thead>
        </table>
    </div>

    <div class="container">
        <table class="table table-bordered table-dark table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="3">
                        <center>RESUMEN GENERAL</center>
                    </th>
                </tr>
                <tr>
                    <th scope="col">
                        <center>DIMENSIONES</center>
                    </th>
                    <th scope="col">
                        <center>NOTA</center>
                    </th>
                </tr>
                <?php
                foreach ($data as $row) {
                    ?>
                    <tr>
                        <td scope="col">
                            <center>
                                <?php echo $row[0]; ?>
                            </center>
                        </td>
                        <td scope="col">
                            <center>
                                <?php echo $row[1]; ?>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </thead>
        </table>
    </div>