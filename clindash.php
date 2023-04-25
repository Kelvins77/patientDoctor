
<?php
include('config.php');
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
    <title>Clinic Dashboard</title>
    <style type="text/css">
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

header {
    background-color: #66b3ff;
    padding: 20px;
    color: #fff;
}

h1 {
    margin: 0;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #4CAF50;
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
    margin-top: 2px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #f5f5f5;
}

.delete-button, .cancel-button {
    background-color: #ff6666;
    color: #fff;
    border: none;
    padding: 6px 10px;
    cursor: pointer;
}

.delete-button:hover, .cancel-button:hover {
    background-color: #ff3333;
}
.footer{
            background-color: #5cb3ff;
            color: white; 
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Clinic Dashboard</h1>
        <a href="sreg.php" class="button">Register Specialist</a>
        <a href="logout.php" class="button" style="float: right;">Logout</a>
    </header>
    <main>
        <section class="table-section">
            <h2>Specialist Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Specialist ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from tbl_specialist table
                    $specialistQuery = "SELECT * FROM tbl_specialist";
                    $specialistResult = mysqli_query($conn, $specialistQuery);

                    // Generate table rows with data from tbl_specialist table
                    while ($row = mysqli_fetch_assoc($specialistResult)) {
                        echo '<tr>';
                        echo '<td>' . $row['specialist_id'] . '</td>';
                        echo '<td>' . $row['full_name'] . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td><button class="delete-button" value="' . $row['specialist_id'] . '">Delete</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="table-section">
            <h2>Appointment Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Appointment Time</th>
                        <th>Appointment Date</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from tbl_book table
                    $appointmentQuery = "SELECT * FROM tbl_book";
                    $appointmentResult = mysqli_query($conn, $appointmentQuery);

                    // Generate table rows with data from tbl_book table
                    while ($row = mysqli_fetch_assoc($appointmentResult)) {
                        echo '<tr>';
                        echo '<td>' . $row['btime'] . '</td>';
                        echo '<td>' . $row['bdate'] . '</td>';
                        echo '<a href="sdelete.php"><td><button class="cancel-button" value="' . $row['id'] . '">Cancel</button></td></a>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
<?php include('footer.php'); ?>