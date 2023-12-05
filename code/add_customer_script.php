<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO Customers (first_name, last_name, email, phone) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
	$stmt->bindParam(1, $first_name, PDO::PARAM_STR);
	$stmt->bindParam(2, $last_name, PDO::PARAM_STR);
	$stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $phone, PDO::PARAM_STR);
        $stmt->execute();

        echo "New product added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirect back to the index page
    header("Location: customers-view.php");
    exit();
}
