<?php

 include("admin_dashboard.php"); 
include "dbconfig.php"; // Include your database connection configuration file

// Query to retrieve all nurses' information from 'nursetb'
$sql = "SELECT * FROM nursetb";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse List</title>
</head>
           
<body>
    <h1 class="text-center text-brown text-uppercase fs-2">Nurse List</h1>
<div class="container mt-5">
    <table  class="table table-responsive table-bordered border-dark table-hover text-center ">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    
 </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["contact_no"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>
                <button class='btn btn-primary'><a href='updatenurse.php?id=" . $row["id"] . "' class='text-light'>Update</a></button>
                </td>";
            echo "<td>
                <button class='btn btn-danger'><a href='deletedialog.php?deleteid=" . $row["id"] . "' class='text-light'>Delete</a></button>
                </td>";
            echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No nurses found.</td></tr>";
        }
        ?>
    </table>
    
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
$conn->close();
?>
