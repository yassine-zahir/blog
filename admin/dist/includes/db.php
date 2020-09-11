<?php
$servername = "localhost";
$username = "root";
$password = "";
$base = "blog";



// Create connection
$conn = new mysqli($servername, $username, $password,$base);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>