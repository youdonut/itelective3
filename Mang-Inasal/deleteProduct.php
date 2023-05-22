<?php
// Include config file
require_once "config.php";

// Check if the product ID is provided
if (!isset($_GET['id'])) {
    $response = [
        'status' => 'error',
        'message' => 'Product ID not provided.'
    ];
    echo json_encode($response);
    exit;
}

$productId = $_GET['id'];

// Get the product image path from the database
$sql = "SELECT product_image FROM product WHERE product_id = :productId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$productImage = $row["product_image"];

// Delete the product from the database
$sql = "DELETE FROM product WHERE product_id = :productId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":productId", $productId, PDO::PARAM_INT);

// Check if the deletion was successful
if ($stmt->execute()) {
    // Delete the associated image file
    if (!empty($productImage) && file_exists($productImage)) {
        unlink($productImage);
    }

    $response = [
        'status' => 'success',
        'message' => 'Product deleted successfully.'
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Failed to delete the product.'
    ];
}

// Close the statement and connection
unset($stmt);
unset($pdo);

echo json_encode($response);