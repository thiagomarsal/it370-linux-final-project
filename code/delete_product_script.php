<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Perform the deletion
        $sql = "DELETE FROM Products WHERE product_id = :product_id";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            echo "Product deleted successfully";
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

