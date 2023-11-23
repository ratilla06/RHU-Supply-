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


<?php
include "dbconfig.php";

// Check if a specific month was selected
if (isset($_POST['selected_month'])) {
    $selectedMonth = $_POST['selected_month'];
    
    // Query to retrieve medicines and supplies data for the selected month
    $sql = "SELECT medname AS name, initialqty, qtyleft FROM medicinetb 
            UNION 
            SELECT supplyname AS name, initialqty, qtyleft FROM suppliestb 
            WHERE MONTH(expiration) = $selectedMonth";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Monthly Inventory Report for " . date("F", mktime(0, 0, 0, $selectedMonth, 1)) . "</h1>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Initial Quantity</th><th>Quantity Left</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["initialqty"] . "</td>";
            echo "<td>" . $row["qtyleft"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found for the selected month.";
    }
}

$conn->close();
?>


    <h2>Select a Month:</h2>
    <form action="printable_report.php" method="post">
        <select name="selected_month">
            <?php
            // Generate a dropdown list for months
            for ($month = 1; $month <= 12; $month++) {
                echo "<option value='$month'>" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Generate Report">
    </form>
    
    <br>
    
    <!-- JavaScript function to print the report -->
    <script type="text/javascript">
        function printReport() {
            window.print();
        }
    </script>
    
    <!-- Button to trigger the print function -->
    <button onclick="printReport()">Print Report</button>
</body>
</html>

<?php 
echo"<br>";
echo"<br>";
echo"<br>";
include "footer.php";
?>