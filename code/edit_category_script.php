<?php
include 'include/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category_id'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];

        // Perform the update
        $sql = "UPDATE Categories SET 
                category_name = :category_name
                WHERE category_id = :category_id";

        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
            $stmt->execute();

            echo "Category updated successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Category ID not provided";
    }
} else {
    echo "Invalid request method";
}

// Redirect back to the index page
header("Location: category-view.php");
exit();
?>

