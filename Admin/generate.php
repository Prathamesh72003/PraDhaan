<?php
	if(ISSET($_POST['generate'])){
		$code=$_POST['barname'];
		echo "<center><img alt='testing' src='barcode.php?codetype=Code39&size=50&text=".$code."&print=true'/></center>";
	}
?>