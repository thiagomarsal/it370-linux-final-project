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
        $category_id = $_GET['id'];
        $sql = "SELECT * FROM Categories WHERE category_id = $category_id";
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
            <td><?php echo $row['category_id']; ?></td>
            <td><?php echo $row['category_name']; ?></td>
        </tr>
    </table>

    <br>

    <form action="delete_category_script.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
        <p>Are you sure you want to delete this Category?</p>
        <input type="submit" value="Delete Category">
    </form>

    <?php
        } else {
            echo "Category not found";
        }
    } else {
        echo "Invalid product ID";
    }
    ?>
</body>
</html>

