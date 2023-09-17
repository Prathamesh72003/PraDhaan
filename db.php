
<?php
$username = "root";
$database = "gati";
//you'll need to add port number for this pc hehe
$servername ="localhost:3307";
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