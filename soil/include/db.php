<?php
// Database connection parameters
function get_connection() {
$servername = "localhost"; //  database server
$username = "root"; // database username
$password = ""; // database password
$dbname = "soil"; // database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
return $conn;
}
?>