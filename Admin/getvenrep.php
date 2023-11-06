<?php

include '../db.php';
require('fdpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();

$id = $_GET['id'];

$squery = mysqli_query($conn, "SELECT * FROM vendor WHERE id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
    $vendorname = $row['name']; 
    $adr = $row['address']; 
    $date = $row['date']; 
}


$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 5, 'Vendor Report', 0, 0);
$pdf->Cell(59, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 15);


$pdf->Cell(71, 5, $vendorname, 0, 0);
$pdf->Cell(59, 5, '', 0, 0);

$pdf->Cell(59, 5, 'Details', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Locality', 0, 0);
$pdf->Cell(25, 5, 'Vendor ID: ', 0, 0);

$pdf->Cell(34, 5, $id, 0, 1);
$pdf->Cell(130, 5, $adr, 0, 0);
$pdf->Cell(25, 5, 'Reg Date: ', 0, 0);
$pdf->Cell(34, 5, $date, 0, 1);
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, ' ', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);


$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(130, 5, 'Stocks Recieved', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(189, 10, '', 0, 1);


$pdf->Cell(50, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'Stock Id', 1, 0, 'C');
$pdf->Cell(70, 10, 'Item', 1, 0, 'C');
$pdf->Cell(20, 10, 'Qty', 1, 0, 'C');
$pdf->Cell(40, 10, 'Single Unit Price', 1, 0, 'C');
$pdf->Cell(40, 10, 'Date', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

$vquery = mysqli_query($conn, "SELECT * FROM stock WHERE vendor = '$vendorname'");

while ($row = mysqli_fetch_array($vquery)) {
    $stockid = $row['id'];
    $item = $row['item'];
    $units = $row['quantity'];
    $singleUnitPrice = $row['price'];
    $stockDate = $row['date'];

    $pdf->Cell(20, 10, $stockid, 1, 0, 'C');
    $pdf->Cell(70, 10, $item, 1, 0);
    $pdf->Cell(20, 10, $units, 1, 0, 'C');
    $pdf->Cell(40, 10, $singleUnitPrice, 1, 0, 'R');
    $pdf->Cell(40, 10, $stockDate, 1, 1, 'C');
}


$pdf->Output();

?>
