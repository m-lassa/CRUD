<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
button.logOut{
  position: fixed;
  right: 50px;
  top: 10px;
}
</style>
</head>
<body>
<?php
session_start();
?>
	<div class="container">
        <h2>Customer database</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
		<button class="logOut" name="logOut">Log Out</button>	
	</form>
    </div>	
    <br/>
                <p>
                    <a href="add.php" class="btn btn-success">Add</a>
                    <a href="update.php" class="btn btn-primary">Update</a>
                </p>
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Street</th>
                      <th>City</th>
                      <th>Email</th>
                      <th>Phone</th>
                    </tr>
                  </thead>
                  <tbody>

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
                    
                    $sql = "SELECT * FROM customers"; //SQL query to fetch data from the database
                    foreach ($connection->query($sql) as $row) { 
                        //printing to the page
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['First_name'].'</td>';
                        echo '<td>'.$row['Last_name'].'</td>';
                        echo '<td>'.$row['Street'].'</td>';
                        echo '<td>'.$row['City'].'</td>';
                        echo '<td>'.$row['Email'].'</td>';
                        echo '<td>'.$row['Phone'].'</td>';
                        echo '<td width=120>';
                        echo '<a class="btn btn-danger" href="remove.php?id='.$row['id'].'">Remove</a>'.'</td>'; //adding the Delete button
                        echo '</tr>';
                    }
                  
                  ?>
                  </tbody>
            </table><br/>


            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="container">
                <div class="form-group">
                Search:
                <input class="form-control" type="text" name="lastName" placeholder="Last Name">
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button><br/>
            <div class="row" id="printArea"></div>
            </div>
            </form>
            
            <?php
                require 'search.php'; 
            ?>

            <?php
                if(isset($_REQUEST["logOut"])) {
                  session_unset();
                  session_destroy();
                  header("location: index.php");
                }
            ?>

</body>
</html>