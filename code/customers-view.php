<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Customers</h1>
    <a href="add_category.php">Add Customer</a>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th> 
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        include 'include/db_connection.php';

        $sql = "SELECT * FROM Customers";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['customer_id']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td><a href='edit_category.php?id=".$row['category_id']."'>Edit</a> | <a href='delete_category.php?id=".$row['category_id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</body>
</html>
