<?php 
    function connectdba(){
        
    $servername = "localhost";
    $username = "root";
    $password = "2904";
    $dbname = "quanlibanhang";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    }
?>