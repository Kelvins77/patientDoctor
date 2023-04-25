<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialist Dashboard</title>
<style type="text/css">
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

header {
    padding: 20px;
    color: #fff;
    background-color: limegreen;
}

h1 {
    margin: 0;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #FD349C;
    color: #fff;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.button:hover {
    background-color: #2E8B57;
}

.table-section {
    width: 40%;
    margin: 0 auto;
    padding: 2%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #f2f2f2;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ccc;
}

th {
    font-weight: bold;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.cancel-button, .reject-button {
    padding: 5px 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
}

.cancel-button:hover, .reject-button:hover {
    background-color: #0056b3;
}

td[colspan="3"] {
    text-align: center;
}
.footer{
            background-color: #5cb3ff;
            color: white; 
        }

</style>
</head>
<body>
    <header style="background-color: limegreen;">
        <h1 style="text-align: center;">Specialist Dashboard</h1>
        <a href="consult.php" class="button">Consultation Room</a>
        <a href="logout.php" class="button" style="float: right;">LogOut</a>
    </header>
    <div class="table-section">
        <h2>Appointments Made</h2>
        <table>
            <thead>
                <tr>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Manage Appointments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from tbl_book table
                $query = "SELECT bdate, btime FROM tbl_book";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['bdate'] . "</td>";
                        echo "<td>" . $row['btime'] . "</td>";
                        echo "<td><button class='cancel-button'>Cancel Appointment</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>No appointments available at the moment</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="table-section">
        <h2>Consultation Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Consultation ID</th>
                    <th>Patient Name</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from tbl_consult table
                $query = "SELECT id, patient_id FROM tbl_consult";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['patient_id'] . "</td>";
                        echo "<td><button class='reject-button'>Reject</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>No consultation requests available at the moment</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include('footer.php'); ?>