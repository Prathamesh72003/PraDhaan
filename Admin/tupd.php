<?php 
include ('../db.php');

$addunits = intval($_POST['addunits']);
$newprice = intval($_POST['newprice']);
$vendor = mysqli_real_escape_string($conn, $_POST['vendor']);
$id = intval($_POST['id']);

$query = "SELECT * FROM product WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $units = $row['unit'];
    $proname = $row['name'];
    // $buyprice = $row['buy_price'];

    date_default_timezone_set('Asia/Kolkata'); 
    $currentDateTime = date('Y-m-d H:i:s'); 

    $finalunit = $units + $addunits;
    
    $qq = mysqli_query($conn, "UPDATE product SET unit = '$finalunit' WHERE id = '$id'");

    $insto = mysqli_query($conn, "INSERT INTO `stock`(`item`, `quantity`, `vendor`, `price`, `date`) VALUES ('$proname', '$addunits', '$vendor', '$newprice', '$currentDateTime')");

    if ($qq && $insto) {
        echo "done";
    } else {
        echo "nah";
    }
} else {
    echo "Product not found.";
}
?>
