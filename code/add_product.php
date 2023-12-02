<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>
        <form action="add_product_script.php" method="post">
            <label for="product_name">Name:</label>
            <input type="text" name="product_name" id="product_name" required><br><br>
            
            <label for="product_description">Description:</label>
            <textarea name="product_description" id="product_description" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required><br><br>

            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="" disabled selected>Select a category</option>
                <?php
                    include 'include/db_connection.php';

                    $sql = "SELECT * FROM Categories";
                    $result = $pdo->query($sql);

                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                ?>
            </select><br><br>

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>

