<?php
session_start();
include "dbconfig.php"; // Include your database connection configuration file
include "footer.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match in the 'nursetb' table
    $query = "SELECT * FROM nursetb WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: nurse_interface.php"); // Redirect to the nurse interface
        insertActivityLog($username, 'Nurse Login');
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nurse Login</title>
    <!-- Bootstrap CSS CDN - Change the version as needed -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
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

        .error-message {
            color: red;
            text-align: center;
        }

        button {
            margin-top: 10px;
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
    <div class="container">
        <div class="login-form col-md-4">
            <h1>Nurse Login</h1>
            <?php if (isset($error)) {
                echo "<p class='error-message'>$error</p>";
            } ?>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <input type="submit" value="Login" class="btn btn-primary">
                <button class="btn btn-info mt-3"><a href="index.html" class="text-light">Back</a></button>
            </form>
        </div>
    </div>
</body>
</html>
