<?php

include __DIR__.'/../include/db_connection.php';
try
{
$sql = 'select * FROM Categories';
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
("Could not retrieve from item_color: ".
$e->getMessage());
}
include __DIR__.'/../code/category.html.php';
?>

