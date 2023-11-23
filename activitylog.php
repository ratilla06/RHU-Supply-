<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <?php include "admin_dashboard.php";?>
</head>
<body>
<div class="container mt-5">
<table class="table table-responsive table-bordered border-dark table-hover text-center ">
    
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type of Activity</th>
            <th>Date and Time</th>
        </tr>
<?php
include "dbconfig.php";


// Query to retrieve activity logs from the 'activitylogstb' table
$sql = "SELECT * FROM activitylogstb ORDER BY dateandtime DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["accountname"] . "</td>
            <td>" . $row["kindofactivity"] . "</td>
            <td>" . $row["dateandtime"] . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No activity logs found.";
}

$conn->close();
?>
    </table>
    </div>
</body>
</html>
