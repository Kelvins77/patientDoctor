<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $specialist_id = $_POST["specialist_id"];
    $password = $_POST["password"];

    // Fetch user data from patient table
    $select_query = "SELECT * FROM tbl_specialist WHERE specialist_id='$specialist_id'";
    $select_result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($select_result) > 0) {
        // User exists, check password
        $row = mysqli_fetch_assoc($select_result);
        if ($password == $row["password"]) {
            // Password matches, redirect to pdash.php
            $_SESSION["success"] = "Login successful!";
            ob_start(); // Start output buffering
            header("Location: specildash.php");
            ob_end_flush(); // Flush output buffer and send headers
            exit;
        } else {
            // Password incorrect, show error message
            $_SESSION["error"] = "Error: Incorrect password.";
            ob_start(); // Start output buffering
            header("Location: slog.php");
            ob_end_flush(); // Flush output buffer and send headers
            exit;
        }
    } else {
        // User does not exist, show error message
        $_SESSION["error"] = "Error: User with this email does not exist.";
        ob_start(); // Start output buffering
        header("Location: slog.php");
        ob_end_flush(); // Flush output buffer and send headers
        exit;
    }
}
?>
