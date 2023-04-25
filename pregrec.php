<?php
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Check if email is unique
    $check_email_query = "SELECT * FROM tbl_patient WHERE email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION["error"] = "Error: User with this email already exists.";
    } else {
        // Check if password matches confirm password
        if ($password !== $confirmpassword) {
            $_SESSION["error"] = "Error: Password and Confirm Password do not match.";
        } else {
            // Insert user data into patient table
            $insert_query = "INSERT INTO tbl_patient (full_name, email, age, password) VALUES ('$full_name', '$email', '$age', '$password')";
            $insert_result = mysqli_query($conn, $insert_query);
            if ($insert_result) {
                $_SESSION["success"] = "User registered successfully!";
                header("Location: plog.php"); // Redirect to pdash.php
                exit;
            } else {
                $_SESSION["error"] = "Error: Failed to register user.";
            }
        }
    }
}

?>
