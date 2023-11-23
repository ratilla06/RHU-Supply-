<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Monthly Inventory Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        select {
            padding: 8px;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .print-button {
            margin-top: 20px;
            padding: 8px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include "admin_dashboard.php";?>
    <div class="container">
        <h2>Select a Month:</h2>
        <form action="printable_report.php" method="post" class="mb-3">
            <select name="selected_month" class="form-select mb-3">
                <?php
                // Generate a dropdown list for months
                for ($month = 1; $month <= 12; $month++) {
                    echo "<option value='$month'>" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Generate Report" class="btn btn-primary">
        </form>

        <?php
        include "dbconfig.php";

        // Check if a specific month was selected
        if (isset($_POST['selected_month'])) {
            $selectedMonth = $_POST['selected_month'];
            
            // Query to retrieve medicines and supplies data for the selected month
            $sql = "SELECT medname AS name, initialqty, qtygiventopatient, qtyleft FROM medicinetb 
                    UNION 
                    SELECT supplyname AS name, initialqty, qtygiventopatient, qtyleft FROM suppliestb 
                    WHERE MONTH(expiration) = $selectedMonth";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h1 class='text-center'>Monthly Inventory Report for " . date("F", mktime(0, 0, 0, $selectedMonth, 1)) . "</h1>";
                echo "<table class='table'>";
                echo "<thead class='thead-light'><tr><th>Name</th><th>Initial Quantity</th><th>Quantity Left</th></tr></thead><tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["initialqty"] . "</td>";
                    echo "<td>" . $row["qtygiventopatient"] . "</td>";
                    echo "<td>" . $row["qtyleft"] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p class='text-center'>No data found for the selected month.</p>";
            }
        }

        $conn->close();
        ?>

        <!-- Button to trigger the print function -->
        <button onclick="printReport()" class="btn btn-primary print-button">Print Report</button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-dZUMQaSAwA2b6L/8IJnZCHR6VMTZQ/TDGOvJ+8eW7p2Or8+iC2x2RKS00yPm3Yi+" crossorigin="anonymous"></script>
    <!-- JavaScript function to print the report -->
    <script type="text/javascript">
        function printReport() {
            window.print();
        }
    </script>
</body>
</html>
