<?php
include('config.php');
// Fetch patient_id from session
$id = $_SESSION['id'];

// Fetch appointment data from form
$bdate = $_POST['bdate'];
$btime = $_POST['btime'];

// Insert appointment data into tbl_book
$sql = "INSERT INTO tbl_book (bdate, btime, patient_id) VALUES ('$bdate', '$btime', 'id')";

if (mysqli_query($conn, $sql)) {
    echo "Appointment booked successfully!";
    // Redirect to pdash1.php after successful booking
    header("Location: pdash1.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
