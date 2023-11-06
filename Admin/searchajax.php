<?php 
  include("../db.php");
  
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM product WHERE bar_code LIKE '$name%' OR name LIKE '$name%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
    $data .=  "<tr><td>".$row['name']."</td><td>".$row['bar_code']."</td><td>".$row['unit']."</td><td><a href='#' data-role='update' data-id='".$row['id']."'>ADD</a></td></tr>";
   }
    echo $data;
 ?>