<?php
$dbname = $_ENV['DB_NAME_' . strtoupper($path[1])];
try {
    $conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$dbname,$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>