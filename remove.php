<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$dsn = "mysql:host=localhost;dbname=test_db";
$root = "root";
$rootpass = "";  //for testing

try {
    $connection = new PDO($dsn, $root, $rootpass);	//connection to database	
} catch (PDOException $e) {
    die("Error: ".$e->getMessage());
}
$connection->exec("SET NAMES utf8");

$id = $_REQUEST['id'];//ID of row to be removed
$sql = $connection->prepare("DELETE FROM customers  WHERE id = '$id'");//SQL query to remove row
$sql->execute();
echo "</br><b>Record removed.</b>";
?>
</br></br>
<a class="btn btn-light" href="display.php">Back</a>
</body>
</html>