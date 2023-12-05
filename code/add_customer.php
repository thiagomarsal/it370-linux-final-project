<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="include/styles.css">
</head>
<body>
    <div class="container">
	<h1>Add Customer</h1>


     

    <br>

        <form action="add_customer_script.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required><br><br>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required><br><br>

            <input type="submit" value="Add Customer">
        </form>
    </div>
</body>
</html>
