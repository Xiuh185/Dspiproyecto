<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filename = $_POST['filename'];

    if (!empty($filename)){
        $filename = preg_replace("/[^a-zA-Z0-9_\-]/", "", $filename);
        require('fpdf/fpdf.php');
        include('conexion2.php');
    // Generar PDF
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Compras', 10, 0, 'C');
        $this->Ln(5);
    }
 
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
 
    function ChapterTitle($num, $label)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "$num $label", 0, 1);
        $this->Ln(4);
    }
 
    function ChapterBody($body)
    {
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $body);
        $this->Ln();
    }
    function cabeceraHorizontal($cabecera){
        $this -> SetXY(10, 35);
        $this->SetFont('Arial', '', 12);
        foreach ($cabecera as $columna){
            $this->Cell(40, 10, $columna, 1);
        }
    }
    function AddArticle($producto, $cantidad, $precio, $total)
    {
        $this->SetFont('Arial', '', 12);
        $this->Cell(40, 10, $producto, 1);
        $this->Cell(40, 10, $cantidad, 1);
        $this->Cell(40, 10, $precio, 1);
        $this->Cell(40, 10, $total, 1);
        $this->Ln();
    }
}
 
$consulta = "SELECT * FROM carrito";
$resultado = mysqli_query($conex, $consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->Ln(10);
$pdf->ChapterTitle(1, 'Articulos Seleccionados');
//arrreglo de la cabecera
$pdf->Ln(10);
//
$pdf->setFont('Arial', '', 12);
$cabecera = array('Producto', 'Cantidad (Unit)', 'Precio Unit', 'Total');
$pdf->cabeceraHorizontal($cabecera);
$pdf->Ln(10);
$total_final = 0;
while ($row = mysqli_fetch_assoc($resultado)) {
    $pdf->AddArticle($row['producto'], $row['cantidad'], $row['precio'], $row['total']);
    $total_final += $row['total'];
}
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 10, 'Total Final en Pesos (MXN)', 1);
$pdf->Cell(40, 10, $total_final, 1);
 
 
// Generar el PDF y guardarlo en el servidor
 // Nombre del archivo dinámico
 $nombre_archivo = $filename . ".pdf";
 // Salida del archivo PDF
 $pdf->Output('F', $nombre_archivo);
 //Vaciar la tabla de carrito
 $consulta = "TRUNCATE TABLE carrito";
 if ($conex->query($consulta) === TRUE){
    echo "Tabla carrito vaciada";
 } else {
        echo "Error: ". $consulta. "<br>". $conex->error;
 }

 // Redirigir a la vista previa del PDF
 header("Location: ver_pdf.php?file=" . urlencode($nombre_archivo));
 exit;
} else {
 echo "Por favor, ingrese un nombre de archivo válido.";
}
} 
?>
