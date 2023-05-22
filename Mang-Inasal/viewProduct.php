<?php
// Include config file
require_once "config.php";

// Check if product ID is provided
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Prepare and execute the SQL query
    $sql = "SELECT product_id, product_name, product_desc, product_price, product_image FROM product WHERE product_id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the product details
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the product details as JSON response
    header('Content-Type: application/json');
    echo json_encode($product);
}

// Close statement and connection
unset($stmt);
unset($pdo);
?>