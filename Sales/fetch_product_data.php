<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gati";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['barcode'])) {
    $barcode = $_GET['barcode'];
    
    // Assuming 'products' is the table containing product details
    $sql = "SELECT id,name, price, unit FROM product WHERE bar_code = '$barcode'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productData = array(
            'product_id' => $row['id'],
            'product_name' => $row['name'],
            'selling_price' => $row['price'],
            'avail_units' => $row['unit']
        );
        echo json_encode($productData); 
    } else {
        echo json_encode(array()); 
    }
}

$conn->close();
?>
