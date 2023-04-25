<?php
include('config.php');
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clinic_id = $_POST['clinic_id'];
    $clinic_name = $_POST['clinic_name'];
    $level = $_POST['level'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password !== $confirmpassword) {
        $_SESSION['message'] = "Error: Passwords do not match";
        header("Location: clinicreg.php");
        exit();
    }

    // Check if clinic ID already exists
    $sql = "SELECT clinic_id FROM clinic WHERE clinic_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $clinic_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($num_rows > 0) {
        $_SESSION['message'] = "Error: Clinic ID already exists";
        header("Location: cliniclog.php");
        exit();
    }

    // Insert data into clinic table
    $sql = "INSERT INTO tbl_clinic (clinic_id, clinic_name, level, location, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issss", $clinic_id, $clinic_name, $level, $location, $password);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['message'] = "Data inserted successfully";
        header("Location: admin.php");
        exit();
    } else {
        $_SESSION['message'] = "Error in inserting data: " . mysqli_error($conn);
        header("Location: clinicreg.php");
        exit();
    }
}
?>