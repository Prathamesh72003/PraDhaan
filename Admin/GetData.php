<?php 

include('../db.php');

if ($_REQUEST['id']) {
    $sql = "SELECT * from product where id='".$_REQUEST['id']."'";

    $res = mysqli_query($conn, $sql);
    $prodData = array();
    while ($prod = mysqli_fetch_assoc($res)) {
        $prodData = $prod;
    }

    echo json_encode($prodData);

}else{
    echo 0;
}


?>