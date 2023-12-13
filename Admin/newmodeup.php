<?php 
include ('../db.php');

$newmode = $_POST['newmode'];
$id = intval($_POST['id']);

$query = "SELECT * FROM payment WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    $qq = mysqli_query($conn, "UPDATE payment SET mode = '$newmode' WHERE id = '$id'");

    if ($qq) {
        echo "done";
    } else {
        echo "nah";
    }
} else {
    echo "Product not found.";
}
?>
