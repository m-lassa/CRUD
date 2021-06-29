<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<h2>Update database information</h2></br>

 <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
<input name="id" pattern="[0-9]{1,2}"  placeholder="ID" required></br></br>
<input name="street" type="text"  placeholder="Street" required></br></br>
<input name="city" type="text" placeholder="City" required></br></br>
<input name="email" type="email"  placeholder="Email" required></br></br>
<input name="phone" type="tel"  placeholder="Phone Number" required></br></br>

  <button type="submit" name="update" class="btn btn-success">Update</button>
<a class="btn btn-light" href="display.php">Back</a>

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


if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if(isset($_REQUEST["update"])){
    //adding input values to variables
    $id = $_REQUEST['id'];
    $street = $_REQUEST['street'];
    $city = $_REQUEST['city'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    //SQL-query
    $sql = $connection->prepare("UPDATE customers SET Street = '$street', City = '$city', Email = '$email', Phone = '$phone' WHERE id = '$id'");
    $sql->execute();
    echo "</br></br><b>Information updated.</b>";
}
?>
</div>
 </form> 
</body>
</html>