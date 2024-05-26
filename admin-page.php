<!-- Dyan 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-page.css">
    <link rel="icon" type="png" href="images/logo-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <div class="dashboard">
    <button id = "view-employees-button" class="button">
        View Employees
</button>

    </div>  

    <script>
        document.getElementById('view-employees-button').addEventListener('click', function () {
            window.location.href = 'employees-list.php';
        });
    </script>
</body>

</html>
-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clinic_website";

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    $sql = "SELECT AdminID, AccountName, AccountType FROM Admin";
    $result = mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        // Display admin data in a table
        echo "<table>";
        echo "<tr><th>Admin ID</th><th>Name</th><th>Role</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["AdminID"] . "</td>";
            echo "<td>" . $row["AccountName"] . "</td>";
            echo "<td>" . $row["AccountType"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No admin data found.";
    }
}
?>    