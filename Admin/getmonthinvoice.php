<?php

include '../db.php';
require('fdpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();

$month = $_GET['month'];
$year = $_GET['year'];



$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 5, 'Invoice report', 0, 0);
$pdf->Cell(59, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 15);


$pdf->Cell(71, 5, "Details", 0, 0);
$pdf->Cell(59, 5, '', 0, 0);

$pdf->Cell(59, 5, '', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Month: ' . $month, 0, 0);
$pdf->Cell(59, 5, '', 0, 1);

$pdf->Cell(130, 5, 'Year: ' . $year, 0, 1);
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, ' ', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);


$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(130, 5, 'Invoices', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(189, 10, '', 0, 1);


$pdf->Cell(50, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'Invoice Id', 1, 0, 'C');
$pdf->Cell(50, 10, 'Customer name', 1, 0, 'C');
$pdf->Cell(30, 10, 'Date', 1, 0, 'C');
$pdf->Cell(30, 10, 'Amount', 1, 0, 'C');
$pdf->Cell(50, 10, 'Payment to', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);


$vquery = mysqli_query($conn, "SELECT * from invoices where DATE_FORMAT(invoice_date, '%m')=$month and DATE_FORMAT(invoice_date, '%YYYY')=$year;");

$total_amount = 0;
while ($row = mysqli_fetch_array($vquery)) {
    $invoice_id = $row['invoice_id'];
    $customer_name = $row['customer_name'];
    $invoice_date = date('Y-m-d', strtotime($row['invoice_date']));
    $discounted_price = $row['discounted_price'];
    $payment_to = $row['payment_to'];

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, $invoice_id, 1, 0, 'C');
    $pdf->Cell(50, 10, $customer_name, 1, 0, 'C');
    $pdf->Cell(30, 10, $invoice_date, 1, 0, 'C');
    $pdf->Cell(30, 10, $discounted_price, 1, 0, 'C');
    $pdf->Cell(50, 10, $payment_to, 1, 1, 'C');

    $total_amount += $discounted_price;
}
$pdf->Cell(50, 10, '', 0, 1, 'C');
$pdf->Cell(50, 10, '', 0, 1, 'C');
$pdf->Cell(180, 10, "Total Revenue: " . $total_amount, 1, 1, 'C');





$pdf->Output();
