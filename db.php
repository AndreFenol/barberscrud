<?php
$host = "localhost"; // Change to the correct host if needed
$dbname = "appointments"; // Change to the correct database name
$username = "root"; // Change to the correct username
$password = "your_password_here"; // Change to the correct password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set charset to utf8mb4
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
