<?php

$server = "localhost";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$server; dbname=loan", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed : " . $e->getMessage();
}
