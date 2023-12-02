<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Delete Product</h1>

    <?php
    include 'include/db_connection.php';

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM Products WHERE product_id = $product_id";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['product_description']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>
    </table>

    <br>

    <form action="delete_product_script.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
        <p>Are you sure you want to delete this product?</p>
        <input type="submit" value="Delete Product">
    </form>

    <?php
        } else {
            echo "Product not found";
        }
    } else {
        echo "Invalid product ID";
    }
    ?>
</body>
</html>

