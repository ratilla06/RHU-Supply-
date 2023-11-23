
    <?php
include "dbconfig.php";

// Query to retrieve categories
$sql = "SELECT id, categoryname FROM categorytb";
$result = $conn->query($sql);

$categoryTable = "<table>";
$categoryTable .= "<tr><th>Category ID</th><th>Category Name</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryTable .= "<tr>";
        $categoryTable .= "<td >" . $row['id'] . "</td>";
        $categoryTable .= "<td>" . $row['categoryname'] . "</td>";
        $categoryTable .= "</tr>";
    }
}

$categoryTable .= "</table";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $newCategory = $_POST['newcategory'];

    // Check if the category already exists
    $checkSql = "SELECT id FROM categorytb WHERE categoryname = '$newCategory'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows == 0) {
        // Add the new category to the 'categorytb' table
        $insertSql = "INSERT INTO categorytb (categoryname) VALUES ('$newCategory')";
        if ($conn->query($insertSql) === TRUE) {
            echo "Category added successfully.";
            insertActivityLog($username, 'Category Added');
        } else {
            echo "Error adding category: " . $conn->error;
        }
    } else {
        echo "Category already exists. Please choose a different category name.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <style>
        /* Custom CSS styles */
        body {
            font-family: Arial, sans-serif;
            
            padding: 20px;
            margin: 0;
        }

        table {
            width: 80%;
            border-collapse: collapse;           
            margin-bottom: 20px;
        }

   
        th {
            background-color: aqua;
            color: red;
        }

        form {
            margin-bottom: 50px;
            text-align: center;

        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        input[type="submit"] {
            background-color: brown;
            color: white;
        }

        input[type="submit"]:hover {
            background-color: aqua;
        }
    </style>

  <?php 
        include("nurse_dashboard.php"); ?>
</head>
<body>
    
    <h2>Categories</h2>
    <h3>Existing Categories:</h3>
    <?php echo $categoryTable; ?>

    <h3>Add a New Category:</h3>
    <form method="post">
        <label for="newcategory">Category Name:</label>
        <input type="text" name="newcategory" required>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>
<?php
echo "<br>";
include "footer.php";
?>