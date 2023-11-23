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
            <th>Medicine/Supply Name</th>
            <th>Expire Date</th>
        </tr>
<?php
include "dbconfig.php";

// Query to retrieve medicine and supply data with earliest expiration date first
$sql = "SELECT 'Medicine' AS type, medname AS name, expiration FROM medicinetb 
        UNION 
        SELECT 'Supply' AS type, supplyname AS name, expiration FROM suppliestb 
        ORDER BY expiration ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["expiration"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No expiring medicines or supplies found.";
}

$conn->close();
?>
</body>
</div>
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