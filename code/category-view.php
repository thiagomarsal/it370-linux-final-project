<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <h1>Category</h1>
    <a href="add_category.php">Add Category</a>
    <table>
        <tr>
            <th>ID</th>
	    <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        include 'include/db_connection.php';

        $sql = "SELECT * FROM Categories";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['category_id']."</td>";
                echo "<td>".$row['category_name']."</td>";
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

