<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gati";

// Retrieve submitted data
$customer_name = $_POST['customer_name'];
$invoice_date = $_POST['invoice_date'];
$salesp = $_POST['selectSales'];
$payment_type = $_POST['paymentType'];
$payment = $_POST['mode'];
$products = $_POST['products'];
$quantities = $_POST['quantities'];
$grandtotal = $_POST['grand_total'];

if ($_POST['disc']) {
    $disc_price = $_POST['disc'];
} else {
    $disc_price = $grandtotal;
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Begin the transaction
    $conn->beginTransaction();

    // Insert into 'invoices' table
    $stmt_invoice = $conn->prepare("INSERT INTO invoices (customer_name, invoice_date,salesperson, payment_type,paymentacc, total_amount, discounted_price) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $total_amount = 0;

    // Insert invoice details without total amount first to get the generated invoice ID
    $stmt_invoice->execute([$customer_name, $invoice_date, $salesp, $payment_type, $payment, 0, $disc_price]);
    $last_invoice_id = $conn->lastInsertId();



    // Loop through each product and its quantity
    foreach ($products as $index => $product_id) {
        $quantity = $quantities[$index];

        // Fetch product details (price and quantity in stock) from the 'products' table
        $stmt_product = $conn->prepare("SELECT price, unit FROM product WHERE id = ?");
        $stmt_product->execute([$product_id]);
        $product_details = $stmt_product->fetch();

        $product_price = $product_details['price'];
        $product_quantity_in_stock = $product_details['unit'];

        $total_cost = $product_price * $quantity;
        $total_amount += $total_cost;

        if ($product_quantity_in_stock < $quantity) {
            throw new Exception("Insufficient stock for product ID: $product_id");
        }

        // Insert into 'invoice_details' table
        $stmt_invoice_details = $conn->prepare("INSERT INTO invoice_details (invoice_id, product_id, quantity, total_cost) VALUES (?, ?, ?, ?)");
        $stmt_invoice_details->execute([$last_invoice_id, $product_id, $quantity, $total_cost]);

        // Update the 'products' table with reduced quantity
        $new_quantity_in_stock = $product_quantity_in_stock - $quantity;
        $stmt_update_product = $conn->prepare("UPDATE product SET unit = ? WHERE id = ?");
        $stmt_update_product->execute([$new_quantity_in_stock, $product_id]);
    }

    // Update the 'invoices' table with the total amount
    $stmt_update_invoice = $conn->prepare("UPDATE invoices SET total_amount = ? WHERE invoice_id = ?");
    $stmt_update_invoice->execute([$total_amount, $last_invoice_id]);

    $stmt_update_sales_person = $conn->prepare("UPDATE sales_person set items_sold=items_sold+1 where name=?");
    $stmt_update_sales_person->execute([$salesp]);

    // Commit the transaction
    $conn->commit();
    echo "Invoice generated successfully";

    echo "<script>window.location.href = 'billreciept.php?id=$last_invoice_id';</script>";
} catch (PDOException $e) {
    // Rollback the transaction if something went wrong
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
