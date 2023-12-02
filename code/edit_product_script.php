<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $price = $_POST['price'];

        // Perform the update
        $sql = "UPDATE Products SET 
                product_name = :product_name, 
                product_description = :product_description, 
                price = :price 
                WHERE product_id = :product_id";

        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_description', $product_description, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->execute();

            echo "Product updated successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Product ID not provided";
    }
} else {
    echo "Invalid request method";
}

// Redirect back to the index page
header("Location: index.php");
exit();
?>

