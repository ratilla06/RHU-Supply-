<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Profile</title>
    <style>
    /* Custom CSS styles */
    .profile-image {
        width: 200px; /* Modify the width as needed */
        height: 250px; /* Modify the height to match the width */
        border-radius: 10%; /* Change the border-radius to make it slightly rounded */
        object-fit: cover;
        margin-right: 10px;
    }
    .profile-details {
        display: flex;
        align-items: center;
    }
    .profile-details h1 {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: normal;
    }
</style>

</head>
<body>

<?php
session_start();
include("admin_dashboard.php");
include "dbconfig.php";

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

// Query to retrieve admin profile from 'admintb'
$sql = "SELECT * FROM admintb WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
    $contactNo = $row["contact_no"];
    $address = $row["address"];
} else {
    // Handle the case where the admin profile is not found
    echo "Error: Admin profile not found.";
    exit();
}

$conn->close();
?>

<div class="container mt-5">
    <h1 class="text-left text-brown text-uppercase fs-3">Admin Profile</h1>
    <?php 

echo"<br>";
?>
    <div class="profile-details">
        <!-- Logo column -->
        <img src="image/profile1.jpg" alt="Logo" class="profile-image">
        
        <!-- Profile information column -->
        <div>
            <h1 class="text-black text-uppercase fs-5">
                 Name: <?php echo $name; ?><br>
                <br>
                Contact Number: <?php echo $contactNo; ?><br>
                <br>
                Address: <?php echo $address; ?>
            </h1>
        </div>
    </div>
    <?php 
echo"<br>";
echo"<br>";
?>
    <button class="btn btn-info mt-3"><a href="updateadmin.php?id=<?php echo $id; ?>" class="text-light">Update Admin</a></button>
  
</div>

<!-- Bootstrap JS and additional content as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Add additional content as needed -->

<?php 
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
include "footer.php"; ?>

</body>
</html>
