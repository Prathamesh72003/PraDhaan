<?php 

include('../db.php');

if ($_REQUEST['id']) {
    $sql = "SELECT alice from payment where id='".$_REQUEST['id']."'";

    $res = mysqli_query($conn, $sql);
    $payData = array();
    while ($pay = mysqli_fetch_assoc($res)) {
        $payData = $pay;
    }

    echo json_encode($payData);

}else{
    echo 0;
}


?>