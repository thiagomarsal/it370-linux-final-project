<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Delete Category</h1>

    <?php
    include 'include/db_connection.php';

    if(isset($_GET['id'])) {
        $customer_id = $_GET['id'];
        $sql = "SELECT * FROM Customers WHERE customer_id = $customer_id";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <tr>
            <td><?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
        </tr>
    </table>

    <br>

    <form action="delete_customer_script.php" method="post">
        <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']; ?>">
        <p>Are you sure you want to delete this Customer?</p>
        <input type="submit" value="Delete Customer">
    </form>

    <?php
        } else {
            echo "Customer not found";
        }
    } else {
        echo "Invalid customer ID";
    }
    ?>
</body>
</html>

