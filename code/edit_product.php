<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Edit Product</h1>

    <?php
    include 'include/db_connection.php';

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM Products WHERE product_id = :product_id";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
    ?>

    <form action="edit_product_script.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
        
        <label for="product_name">Name:</label>
        <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>"><br><br>
        
        <label for="product_description">Description:</label>
        <textarea name="product_description"><?php echo $row['product_description']; ?></textarea><br><br>
        
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $row['price']; ?>"><br><br>
        
        <input type="submit" value="Update Product">
    </form>

    <?php
            } else {
                echo "Product not found";
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

