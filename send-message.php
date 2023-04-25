<?php
include('config.php');
// Get input data
$data = json_decode(file_get_contents("php://input"), true);
$sender = $data['sender'];
$message = $data['message'];

// Insert chat message into the consultation_tbl table
$query = "INSERT INTO tbl_consult (sender, message) VALUES ('$sender', '$message')";
$result = $mysqli->query($query);

if ($result) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();