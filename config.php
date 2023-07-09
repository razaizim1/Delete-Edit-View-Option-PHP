<?php 

$hostname = "localhost";
$username = "root";
$database = "batch";
$password = "";

try {
    $connection = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password);

    // set PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successful!";
} catch (PDOException $e) {
    echo "Connection Failed:" . $e->getMessage();
}

?>