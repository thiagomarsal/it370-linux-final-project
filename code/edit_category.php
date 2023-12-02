<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Edit Category</h1>

    <?php
    include 'include/db_connection.php';

    if(isset($_GET['id'])) {
        $category_id = $_GET['id'];
        $sql = "SELECT * FROM Categories WHERE category_id = :category_id";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
    ?>

    <form action="edit_category_script.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
        
        <label for="category_name">Name:</label>
        <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>"><br><br>
        
        <input type="submit" value="Update Category">
    </form>

    <?php
            } else {
                echo "Category not found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid product ID";
    }
    ?>
</body>
</html>

