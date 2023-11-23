<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
  <?php 
        include("nurse_dashboard.php"); ?>
</head>
<body>
<div class="container mt-5">
<table class="table table-responsive table-bordered border-dark table-hover text-center ">

 
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Medicine Given</th>
            <th>Quantity Given</th>
            <th>Remarks</th>
        </tr>
        </div>
<?php
include "dbconfig.php";

// Query to retrieve patient data from the 'patienttb' table
$sql = "SELECT * FROM patienttb ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["medgiven"] . "</td>";
        echo "<td>" . $row["qty"] . "</td>";
        echo "<td>" . $row["remarks"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No patient records found.";
}

$conn->close();
?>
</table>
</body>
</html>
<?php
echo "<br>";
include "footer.php";
?>