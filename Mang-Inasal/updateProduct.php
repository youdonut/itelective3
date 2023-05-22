<?php
// Include config file
require_once "config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["productPrice"];

    // Check if a new image is uploaded
    if ($_FILES["productImageUpdate"]["error"] == 0) {
        // Remove old image file from server
        $sql = "SELECT product_image FROM product WHERE product_id = :productId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $oldImage = $row["product_image"];
        if (!empty($oldImage)) {
            unlink($oldImage);
        }

        // Upload the new image file
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["productImageUpdate"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($imageFileType, $allowedExtensions)) {
            move_uploaded_file($_FILES["productImageUpdate"]["tmp_name"], $targetFile);
            $productImage = $targetFile;
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed."]);
            exit;
        }
    } else {
        // No new image uploaded, retain the existing image
        $sql = "SELECT product_image FROM product WHERE product_id = :productId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $productImage = $row["product_image"];
    }

    // Update product details and image in the database
    $sql = "UPDATE product SET product_name = :productName, product_desc = :productDesc, product_price = :productPrice, product_image = :productImage WHERE product_id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
    $stmt->bindParam(":productName", $productName);
    $stmt->bindParam(":productDesc", $productDesc);
    $stmt->bindParam(":productPrice", $productPrice);
    $stmt->bindParam(":productImage", $productImage);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Product details updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update product details"]);
    }

    // Close statement and connection
    unset($stmt);
    unset($pdo);
}
?>