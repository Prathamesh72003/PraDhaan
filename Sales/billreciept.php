<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gati";

$conn = new mysqli($servername, $username, $password, $dbname);

require('fdpdf/fpdf.php');

$id = $_GET['id'];
$query = "SELECT * FROM invoices WHERE invoice_id = ?";

$squery = mysqli_query($conn, "SELECT * FROM invoices WHERE invoice_id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
    $cname = $row['customer_name']; 
    $onum = $row['invoice_id'];
    $date = $row['invoice_date'];
    $total = $row['total_amount'];
    $mode = $row['paymentacc'];
    $paytype = $row['payment_type'];
    $disc_price = $row['discounted_price'];
}


$pdf = new FPDF('P','mm',array(80,200));

$pdf->AddPage();

$pdf->SetFont ('Arial', 'B', 16) ; 
$pdf->Cell (60, 8, 'SUVARNA KALAKAR', 1,1, 'C');
$pdf->Ln(3); 
$pdf->SetFont ('Arial', 'B', 8) ;
$pdf->Cell (60,5, 'Address : 76, Budhwar Peth, Tulsi Baug, Pune-2', 0,1, 'C');
$pdf->Cell (60,5, 'Phone Number: +91 9822395560', 0,1, 'C');

$pdf->Line(7,32, 72,32);
$pdf->Ln(3); 

$pdf->SetFont('Arial' , 'BI' ,8);
$pdf->Cell(20,4, 'Bill To :',0,0,'');

$pdf->SetFont ('Courier', 'BI', 8) ;
$pdf->Cell (40, 4, $cname, 0,1, '');

$pdf->SetFont('Arial' , 'BI' ,8);
$pdf->Cell(20,4, 'Order No:',0,0,'');

$pdf->SetFont ('Courier', 'BI', 8) ;
$pdf->Cell (40, 4, $onum, 0,1, '');

$pdf->SetFont('Arial' , 'BI' ,8);
$pdf->Cell(20,4, 'Date:',0,0,'');

$pdf->SetFont ('Courier', 'BI', 8) ;
$pdf->Cell (40, 4, $date, 0,1, '');


$pdf->Ln(3); 
//main table

$pdf->SetX(7) ;
$pdf->SetFont ('Courier', 'B', 8);
$pdf->Cell (34,5, 'PRODUCT',1,0,'C');
$pdf->Cell (9,5, 'QTY' , 1, 0, 'C');
$pdf->Cell (11,5, 'PRICE' , 1, 0, 'C');
$pdf->Cell (12,5, 'TOTAL' ,1,1, 'C');

$result = $conn->query("SELECT invoice_details.*, product.* FROM invoice_details INNER JOIN product ON invoice_details.product_id = product.id WHERE invoice_details.invoice_id = $id");

while ($item = $result->fetch_assoc()) {
    $pdf->SetX(7) ;
    $pdf->SetFont ('Helvetica', 'B' ,8);
    $pdf->Cell(34, 5, $item['name'], 1, 0, 'L');
    $pdf->Cell(9, 5, $item['quantity'], 1, 0, 'C');
    $pdf->Cell(11, 5, $item['price'], 1, 0, 'C');
    $pdf->Cell(12, 5, $item['price'] * $item['quantity'], 1, 1, 'C');
}

$ptypeq = $conn->query("SELECT * FROM payment where id='$paytype'");

while ($item = $ptypeq->fetch_assoc()) {
    $paymenttype = $item['mode'];
}


//subtables

$pdf->SetX(7);
$pdf->SetFont ('courier', 'B', 8);
$pdf->Cell(20,5,'', 0,0, 'L');
$pdf->Cell (25,5, 'DISCOUNT' , 1, 0, 'C');
$pdf->Cell (20, 5, $total-$disc_price,1,1, 'C');

$pdf->SetX(7);
$pdf->SetFont ('courier', 'B', 10);
$pdf->Cell(20,5,'', 0,0, 'L');
$pdf->Cell (25,5, 'TOTAL' , 1, 0, 'C');
$pdf->Cell (20, 5, $disc_price,1,1, 'C');

$pdf->SetX(7);
$pdf->SetFont ('courier', 'B', 8);
$pdf->Cell(20,5,'', 0,0, 'L');
$pdf->Cell (25,5, 'PAYMENT TYPE' , 1, 0, 'C');
$pdf->Cell (20, 5, $paymenttype,1,1, 'C');


//footer

$pdf->Cell (20,5, '', 0,1, '');


$pdf->SetX(7);
$pdf->SetFont ('Courier', 'B',8);
$pdf->Cell (25,5, 'Important Notice :',0,1,'');

$pdf->SetX(7);
$pdf->SetFont ('Arial','',5);
$pdf->Cell(75,5, '-> No gaurentee for breakage.', 0,2, '');

$pdf->SetX(7) ;
$pdf->SetFont ('Arial','' ,5);
$pdf->Cell (75,5, '-> Goods once sold will not be taken back. ',0,1, '');

$pdf->SetX(7) ;
$pdf->SetFont ('Arial','' ,5);
$pdf->Cell (75,5, '-> Subject to Pune Jurisdiction. ',0,1, '');

$pdf->Output();
?>
