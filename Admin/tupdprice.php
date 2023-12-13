<?php 
include ('../db.php');

$updatedprice = intval($_POST['updatedprice']);
$id = intval($_POST['id']);

$query = "SELECT * FROM product WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    $qq = mysqli_query($conn, "UPDATE product SET buy_price = '$updatedprice' WHERE id = '$id'");

    if ($qq) {
        echo "done";
    } else {
        echo "nah";
    }
} else {
    echo "Product not found.";
}
?>
