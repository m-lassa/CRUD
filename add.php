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

                        <h2>Add customer</h2></br>

                    <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input name="firstName" type="text"  placeholder="First Name" required></br></br>
                    <input name="lastName" type="text"  placeholder="Last Name" required></br></br>
                    <input name="street" type="text"  placeholder="Street" required></br></br>
                    <input name="city" type="text"  placeholder="City" required></br></br>
                    <input name="email" type="email"  placeholder="Email" required></br></br>
                    <input name="phone" type="tel"  placeholder="Phone number" required></br></br>

                          <button type="submit" name="add" class="btn btn-success">Add</button>
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

//'Add' function
if(isset($_REQUEST["add"])){
    //adding input values to variables
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $street = $_REQUEST['street'];
    $city = $_REQUEST['city'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    //SQL query
    $sql = $connection->prepare("INSERT INTO customers (First_name, Last_name, Street, City, Email, Phone) VALUES ('$firstName', '$lastName', '$street', '$city', '$email','$phone')");
    $sql->execute(); //executing query
    echo "</br></br><b>Customer added.</b>";
}

?>
</div>
</form>
</body>
</html>
