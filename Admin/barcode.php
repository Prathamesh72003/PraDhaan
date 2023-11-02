<?php 

include('../db.php');

$product_id = $_POST['product_id'];
$cat = $_POST['cat'];
$sample = $product_id . substr($cat, 0, 3);

$sql = "UPDATE product SET bar_code = '$sample' WHERE id = $product_id";

if ($conn->query($sql) === TRUE) {
    // echo "Price updated successfully";
} else {
    // echo "Error updating price: " . $conn->error;
}

?>

<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 10%">
		<?php
		include 'barcode128.php';
		$product = $_POST['prod'];
		$product_id = $_POST['product_id'];
		$cat = $_POST['cat'];
		$sample = $product_id . substr($cat, 0, 3);
		$rate = $_POST['rate'];

		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($sample))."<span ><b>Price: ".$rate." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>
