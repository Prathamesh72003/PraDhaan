<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gati";

// Create a connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch products from the 'products' table
$stmt = $conn->query("SELECT id, name FROM product");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($products);
?>
