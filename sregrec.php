<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data    
    $specialist_id = $_POST["specialist_id"];
    $full_name = $_POST["full_name"];
    $category = $_POST["category"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

    // Validate password and confirm password fields
    if ($password !== $confirmPassword) {
        $_SESSION["serror"] = "Password and Confirm Password do not match.";
        header("Location: sreg.php");
        exit();
    }

    // Check if specialistID already exists
    $sql = "SELECT * FROM tbl_specialist WHERE specialist_id = '$specialist_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["serror"] = "SpecialistID already exists.";
        header("Location: sreg.php");
        exit();
    }

    // Insert data into specialist table
    $sql = "INSERT INTO tbl_specialist (specialist_id, full_name, category, password) VALUES ('$specialist_id', '$full_name', '$category', '$password')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["ssuccess"] = "Specialist account created successfully.";
        header("Location: clindash.php");
        exit();
    } else {
        $_SESSION["serror"] = "Error: " . mysqli_error($conn);
        header("Location: sreg.php");
        exit();
    }
}

mysqli_close($conn);
?>