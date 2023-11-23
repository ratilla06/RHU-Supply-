<?php
include "dbconfig.php";
session_start();


// Check if the nurse is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

// Query to retrieve nurse profile from 'nursetb' - using prepared statements for security
$stmt = $conn->prepare("SELECT id, name, contact_no, address FROM nursetb WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
    $contactNo = $row["contact_no"];
    $address = $row["address"];
} else {
    // Handle the case where the nurse profile is not found
    // You can redirect to an error page or display an error message
    echo "Error: Nurse profile not found.";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <?php   include("nurse_dashboard.php");?>
</head>
<body>
    <h1 class="text-center text-brown text-uppercase fs-2">Nurse Profile</h1>
    <p class="text-center text-black text-uppercase fs-4">Welcome, <?php echo htmlspecialchars($name); ?>!</p>
    <div class="container mt-5"> 
        <ul class="list-unstyled text-center text-black text-uppercase fs-4">
            <li>Name: <?php echo htmlspecialchars($name); ?></li>
            <li>Contact Number: <?php echo htmlspecialchars($contactNo); ?></li>
            <li>Address: <?php echo htmlspecialchars($address); ?></li>
        </ul>
        
    </div>
    
    <!-- Add additional content as needed -->

    <!-- Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
echo "<br>";
include "footer.php";
?>