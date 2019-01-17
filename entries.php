<?php
$servername = "localhost";
$username = "calculator";
$password = "calch4x";
$database = "calculator";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// get em
$entry = $_REQUEST["entry"];

mysqli_query($conn, 'INSERT INTO entries (entry) VALUES ("'.$entry.'")');
?>
