<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO Categories (category_name) VALUES (?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $category_name, PDO::PARAM_STR);
        $stmt->execute();

        echo "New category added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirect back to the index page
    header("Location: category-view.php");
    exit();
}
?>

