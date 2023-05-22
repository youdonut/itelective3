<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["productPrice"];

    // Image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["productImage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Allow only certain file formats
    $allowedExtensions = array("webp", "jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Sorry, only WEBP, JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["productImage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert into the database if the file was uploaded successfully
    if ($uploadOk == 1) {
        $sql = "INSERT INTO product (product_name, product_desc, product_price, product_image) VALUES (:productName, :productDesc, :productPrice, :productImage)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":productName", $productName);
            $stmt->bindParam(":productDesc", $productDesc);
            $stmt->bindParam(":productPrice", $productPrice);
            $stmt->bindParam(":productImage", $targetFile);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: product.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>