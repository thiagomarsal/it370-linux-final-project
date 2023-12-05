<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['customer_id'])) {
        $customer_id = $_POST['customer_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Perform the update
        $sql = "UPDATE Customers SET
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone  
                WHERE customer_id = :customer_id";

        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->execute();

            echo "Customer updated successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Customer ID not provided";
    }
} else {
    echo "Invalid request method";
}

// Redirect back to the index page
header("Location: customers-view.php");
exit();
?>
