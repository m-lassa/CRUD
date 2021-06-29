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

if(isset($_REQUEST["search"])){
    $lastname = $_REQUEST["lastName"]; //user input
    $sql = "SELECT * FROM customers WHERE Last_name = '$lastname'"; //looks for the surname in the database

    foreach ($connection->query($sql) as $row) {//gets and prints info from the database
        echo '<b>Name: '.$row['First_name'].' '.$row['Last_name'].'</b></br>';
        echo 'Address: '.$row['Street'].'</br>';
        echo 'City: '.$row['City'].'</br>';
        echo 'Email: '.$row['Email'].'</br>';
        echo 'Phone number: '.$row['Phone'].'</br>';
    }

}

?>