<?php
include('config.php');
// Query to retrieve clinic data
$sql = "SELECT clinic_name, location, level FROM tbl_clinic";
$result = mysqli_query($conn, $sql);

// Retrieve active user's full_name from tbl_patient (hypothetical)
$active_user_id = 1; // Assuming the active user's ID is 1 (you may need to modify this based on your actual implementation)
$sql_user = "SELECT full_name FROM tbl_patient WHERE id = '$active_user_id'";
$result_user = mysqli_query($conn, $sql_user);

// Check for errors in user query
if (!$result_user) {
    die("Query failed: " . mysqli_error($conn));
}

$row_user = mysqli_fetch_assoc($result_user);
$active_user_full_name = $row_user['full_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        #header {
            background-color: #444;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        #header h1 {
            margin: 0;
            padding: 1%;
        }

        #content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 40px);
        }

        #image {
            flex-basis: 40%;
            padding: 10px;
            text-align: center;
        }

        #image img {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
        }

        #table {
            flex-basis: 60%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #table h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
        }

        .select-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2ecc71;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .select-button:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Welcome, <?php echo $active_user_full_name; ?></h1>
          <a href="logout.php" class="select-button" style="float: right;">Log out</a>
    </div>
    <div id="content">
        <div id="image">
           <img src="images/box.jpeg">
        </div>
        <div id="table">
            <h2>Clinic Information</h2>
            <table>
                <tr>
                    <th>Clinic Name</th>
                    <th>Location</th>
                    <th>Clinic Level</th>
                    <th>Selection</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['clinic_name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['level']; ?></td>
                    <td><a href="pdash1.php" class="select-button">Select Clinic</a></td>
                </tr>
                <?php } ?>
            </table>
       
    <?php include('footer.php'); ?>