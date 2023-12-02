<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO Products (product_name, product_description, price) VALUES (?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $product_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $product_description, PDO::PARAM_STR);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->execute();

        echo "New product added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirect back to the index page
    header("Location: index.php");
    exit();
}
?>

