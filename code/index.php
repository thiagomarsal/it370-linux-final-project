<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="add_customer.php">Add Customer</a></li>
            <li><a href="add_category.php">Add Category</a></li>
            <li><a href="add_product.php">Add Product</a></li>
        </ul>
    </nav>

    <h1>Catalog</h1>

    <!-- Display Products in a Table -->
    <table class="product-table">
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
                echo "<td><button onclick='addToCart(".$row['product_id'].")'>Add to Cart</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No products available</td></tr>";
        }
        ?>
    </table>

    <!-- Shopping Cart Section -->
    <div class="cart-container">
        <h2>Shopping Cart</h2>
        <table id="cart" class="cart-table">
            <!-- Cart items will be displayed here dynamically -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </table>
    </div>

    <script>
        function addToCart(productId) {
            // Use AJAX to send a request to add the product to the cart
            // For simplicity, you can handle this using JavaScript and update the cart dynamically
            // You may want to use jQuery or Fetch API for more advanced AJAX requests
            alert("Product added to cart. Product ID: " + productId);

            // For demonstration purposes, update the cart table
            var cartTable = document.getElementById("cart");
            var newRow = cartTable.insertRow(cartTable.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);

            cell1.innerHTML = productId;
            cell2.innerHTML = "Product Name"; // You need to fetch actual product name using AJAX
            cell3.innerHTML = "$20.00"; // You need to fetch actual product price using AJAX
        }
    </script>
</body>
</html>

