<?php
include "dbconfig.php";
 session_start();
    include("admin_dashboard.php"); // Include your database connection configuration file
// Check if the nurse is logged in


if (!isset($_SESSION["username"])) {
header("Location: login.php");
exit();
}

// Get the nurse's username from the session
$adminusername = $_SESSION["username"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $contactNo = $_POST["contact_no"];
    $address = $_POST["address"];

    // Query to insert a new nurse into 'nursetb'
    $insertSql = "INSERT INTO nursetb (username, password, name, contact_no, address) VALUES ('$username', '$password', '$name', '$contactNo', '$address')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Nurse added successfully.";
        insertActivityLog($adminusername, 'Nurse Added');
    } else {
        echo "Error adding nurse: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Nurse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        button {
            margin-top: 15px;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1 class= "text-center text-brown text-uppercase fs-2">Add New Nurse</h1>
    <form action="addnurse.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <input type="submit" value="Add Nurse">
        <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Back</a></button>
    </form>
    <?php 
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo '<br>';
  
    include "footer.php";?>
</body>
</html>
