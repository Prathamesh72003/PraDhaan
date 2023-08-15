
<?php
$username = "root";
$database = "gati";
$servername ="localhost";
$password = "";

$conn = new mysqli($servername,$username,$password,$database);

if ($conn)
{
    //echo "Connection established sucessfully";

}

else{
    echo "Failed to establish connection";
}
?>