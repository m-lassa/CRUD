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


if(isset($_REQUEST["signup"])) { 
    $user = $_REQUEST['user'];
    $password = $_REQUEST['password'];
    $repeat = $_REQUEST['repeat'];
    $hashed = password_hash($password, PASSWORD_BCRYPT); //password encryption
    if($password == $repeat){ //check that passwords match
        //SQL query to add user to database
        $sql = $connection->prepare("INSERT INTO logins (username, pass) VALUES ('$user', '$hashed')");
        $sql->execute();
        echo "<b>Signup successful.</b>";
    }
    else{
        echo "<b>Passwords do not match.</b>";
    }
}

if(isset($_REQUEST["logIn"])) { 
    $userLogIn = $_REQUEST['userLogIn'];
    $passLogIn = $_REQUEST['passLogIn'];
    $sql = "SELECT * FROM logins WHERE username = '$userLogIn'";//finds the user in the database

    foreach ($connection->query($sql) as $row) {
        $hash = $row[2]; //encrypted password
        if(password_verify($passLogIn, $hash)){ //password verification
            $_SESSION['userLogIn'] = $_REQUEST['userLogIn'];
            header("location:display.php"); //if successful, leads to the next page
        }
        else{
            echo "<b>Couldn't sign up.</b>";
        }
    }


}

?>