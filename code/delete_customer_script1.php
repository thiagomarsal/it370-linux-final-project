<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['customer_id'])) {
        $product_id = $_POST['customer_id'];

        // Perform the deletion
        $sql = "DELETE FROM Customers WHERE customer_id = :customer_id";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
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
header("Location: customers-view.php");
exit();
?>
