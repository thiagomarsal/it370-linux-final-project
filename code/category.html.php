<html>
    <head>
        <title>
            Query from Employee
        </title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href-"css/style.css" rel="stylesheet">
    </head>
    <body>

	<style>
		table {
boarder-collapse: collapse;
witch: 100%;
}

th, td {
boarder: 1px solid black;
padding: 8px;
test-align:left;
}
		
th {
background-color: #f2f2f2;
}		


	</style>
        <div id="container">
            <h1>Category View</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                          

 <tr>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

