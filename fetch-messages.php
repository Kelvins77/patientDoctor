<?php
include('config.php');
// Fetch chat messages from the consultation_tbl table
$query = "SELECT sender, message FROM tbl_consult ORDER BY timestamp ASC";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    echo json_encode($messages);
} else {
    echo "0 results";
}

$mysqli->close();
?>