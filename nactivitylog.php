<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <?php  include("nurse_dashboard.php"); ?>
</head>
<div class="container mt-5">
<table class="table table-responsive table-bordered border-dark table-hover text-center ">
  
 
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type of activity</th>
            <th>Date and Time</th>
        </tr>
</div>
<?php
include "dbconfig.php";
include "footer.php";
// Query to retrieve activity logs from the 'activitylogstb' table
$sql = "SELECT * FROM activitylogstb ORDER BY dateandtime DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["accountname"] . "</td>";
        echo "<td>" . $row["kindofactivity"] . "</td>";
        echo "<td>" . $row["dateandtime"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No activity logs found.";
}

$conn->close();
?>
    </table>
</body>
</html>
