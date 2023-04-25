<?php
// Include database config file
include('config.php');
// Fetch data from tbl_patient table
$patientQuery = "SELECT * FROM tbl_patient";
$patientResult = mysqli_query($conn, $patientQuery);

// Fetch data from tbl_clinic table
$clinicQuery = "SELECT * FROM tbl_clinic";
$clinicResult = mysqli_query($conn, $clinicQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Dashboard</title>
    <style type="text/css">
        /* Reset default margin and padding */
body, h1, h2, table {
    margin: 0;
    padding: 0;
}

/* Set padding for the header */
header {
    padding: 20px;
    background-color: grey;
}

/* Style the h1 heading */
h1 {
    color: white;
    font-size: 24px;
}

/* Style the button */
.button {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: blue;
    color: white;
    text-decoration: none;
}

/* Style the button hover effect */
.button:hover {
    background-color: green;
}

/* Set padding for the main content section */
main {
    padding: 20px;
}

/* Style the table sections */
.table-section {
    margin-bottom: 30px;
}

/* Style the tables */
table {
    width: 40%;
    margin: 0 auto;
    border-collapse: collapse;
}

/* Style the table headers */
th {
    background-color: grey;
    color: white;
    padding: 10

    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Automated Doctor Patient Handling System Administrator Dash</h1>
        <a href="clinicreg.php" class="button" >Add Clinic</a>
        <a href="logout.php" class="button" style="float: right;">Log out</a>
    </header>
    <main>
        <section class="table-section">
            <h2>Patient Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Generate table rows with data from tbl_patient table
                    while ($row = mysqli_fetch_assoc($patientResult)) {
                        echo '<tr>';
                        echo '<td>' . $row['full_name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td><button class="delete-button" value="' . $row['id'] . '">Delete</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="table-section">
            <h2>Manage Clinics</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Location</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Generate table rows with data from tbl_clinic table
                    while ($row = mysqli_fetch_assoc($clinicResult)) {
                        echo '<tr>';
                        echo '<td>' . $row['clinic_name'] . '</td>';
                        echo '<td>' . $row['level'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td><button class="delete-button" value="' . $row['clinic_id'] . '">Delete</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
	<?php include('footer.php'); ?>