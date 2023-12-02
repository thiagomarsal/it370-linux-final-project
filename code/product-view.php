<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Product Catalog</h1>
    <a href="add_product.php">Add Product</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        include 'include/db_connection.php';

        $sql = "SELECT * FROM Products";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['product_id']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td>".$row['product_description']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td><a href='edit_product.php?id=".$row['product_id']."'>Edit</a> | <a href='delete_product.php?id=".$row['product_id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</body>
</html>

