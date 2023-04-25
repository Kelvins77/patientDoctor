<?php
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Specialists</title>
    <style>
        /* Styling for form container */
        .form-container {
            width: 70%;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            background-color: #fff;
        }

        /* Styling for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling for buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0d6efd;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .btn-red {
            background-color: #dc3545;
        }

        .btn-red:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Available Specialists</h2>
        <a href="book.php" class="btn">Book Appointment</a>
        <table>
            <tr>
                <th>Specialist Name</th>
                <th>Category</th>
                <th>Consult</th>
            </tr>
            <?php
            // Fetch data from tbl_specialist and populate the table
            $sql = "SELECT full_name, category FROM tbl_specialist";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td><a href='consult.php?full_name=" . urlencode($row['full_name']) . "' class='btn'>Consult</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No specialists available</td></tr>";
            }
            ?>
        </table>
        <a href="pdash.php" class="btn btn-red">Close</a>
    </div>
</body>
</html>
