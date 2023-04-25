<?php
// Start session
session_start();

// Database credentials
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "clinicdb";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>