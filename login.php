<?php
session_start();
include "dbconfig.php"; // Include your database connection configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match in the 'admintb'
    $query = "SELECT * FROM admintb WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: admin_interface.php"); // Redirect to the admin interface
        // insert into activitylogtb
        insertActivityLog($username, 'Admin Login');
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
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('image/sam1.jpgs'); /* Replace with your image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        h1 {
            color: brown;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
        }

        label {
            display: block;
            color: brown;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: brown;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5c3907;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        button {
            margin-top: 10px;
            background-color: brown;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5c3907;
        }

        button a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <h1>Admin Login</h1>
    <?php if (isset($error)) {
        echo "<p class='error-message'>$error</p>";
    } ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
        <button><a href="index.html">Back</a></button>
    </form>
</body>
</html>
