<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <?php 
    include("admin_dashboard.php"); ?>
</head>
<body>
<div class="container mt-5">
<table class="table table-responsive table-bordered border-dark table-hover text-center ">
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Expiration</th>
            <th>Initial Quantity</th>
            <th>Quantity Released</th>
            <th>Quantity Left</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        
<?php
include "dbconfig.php";

// Query to retrieve supplies data from the 'suppliestb' table
$sql = "SELECT * FROM suppliestb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["supplyname"] . "</td>";
        echo "<td>" . $row["expiration"] . "</td>";
        echo "<td>" . $row["initialqty"] . "</td>";
        echo "<td>" . $row["qtygiventopatient"] . "</td>";
        echo "<td>" . $row["qtyleft"] . "</td>";
        echo "<td>
                <button class='btn btn-primary'><a href='updatesupp.php?updateid=" . $row["id"] . "' class='text-light'>Update</a></button>
                </td>";
        echo "<td>
                <button class='btn btn-danger'><a href='deletedialog.php?deleteid=" . $row["id"] . "' class='text-light'>Delete</a></button>
                </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No supplies found.";
}

$conn->close();
?>
</table>
</div>
</body>
</html>
<?php
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
include "footer.php";

?>