<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Category</h1>
        <form action="add_category_script.php" method="post">
            <label for="category_name">Name:</label>
            <input type="text" name="category_name" id="category_name" required><br><br>
            
            <input type="submit" value="Add Category">
        </form>
    </div>
</body>
</html>

