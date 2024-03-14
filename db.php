<?php
$host = '127.0.0.1'; // Hostname
$dbname = 'appointmentsystem'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set charset to utf8mb4
    $db->exec("SET NAMES utf8mb4");
    echo "Connected successfully";
} catch(PDOException $e) {
    // Display error message if connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
