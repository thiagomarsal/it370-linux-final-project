 edit_product.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Edit Customers</h1>

    <?php
    include 'include/db_connection.php';

    if(isset($_GET['id'])) {
        $customer_id = $_GET['id'];
        $sql = "SELECT * FROM Customers WHERE customer_id = :customer_id";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
    ?>

    <form action="edit_customer_script.php" method="post">
        <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']; ?>">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>

        <label for="email">Email:</label>
        <textarea name="email"><?php echo $row['email']; ?></textarea><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

        <input type="submit" value="Update Customer">
    </form>

    <?php
            } else {
                echo "Customer not found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid customer ID";
    }
    ?>
</body>
</html>
