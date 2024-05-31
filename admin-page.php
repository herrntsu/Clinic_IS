
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
<h1>Admin Page</h1>

    <h2>Add Doctor</h2>
    <form method="post" action="admin-page.php">
        <input type="text" name="accountName" placeholder="Account Name" required>
        <input type="email" name="employee_email" placeholder="Email" required> 
        <input type="text" name="employee_username" placeholder="Username" required>
        <input type="password" name="employee_password" placeholder="Password" required>
        <input type="text" name="specialty" placeholder="Specialty" required>
        <input type="number" name="roomNumber" placeholder="Room Number" required>
        <input type="submit" name="addDoctor" value="Add Doctor">
    </form>

    <h2>Delete Doctor</h2>
    <form method="post" action="admin-page.php">
        <input type="number" name="employeeID" placeholder="Employee ID" required>
        <input type="submit" name="deleteDoctor" value="Delete Doctor">
    </form>

    <h2>Track Working Hours</h2>
    <form method="post" action="admin-page.php">
        <input type="number" name="employeeID" placeholder="Employee ID" required>
        <input type="submit" name="trackHours" value="Track Working Hours">
    </form>
<!--=<div class="dashboard">
    <button id = "view-employees-button" class="button">
        View Employees
</button>

    </div>  

    <script>
        document.getElementById('view-employees-button').addEventListener('click', function () {
            window.location.href = 'employees-list.php';
        });
    </script>
-->
</body>

</html>


<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "clinic_website"; 

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {

    if (isset($_POST['addDoctor'])) {
        $accountName = $_POST['accountName'];
        $specialty = $_POST['specialty'];
        $roomNumber = $_POST['roomNumber'];
        $email = $_POST['employee_email'];
        $employee_username = $_POST['employee_username'];
        $employee_password = $_POST['employee_password']; 
        addDoctor($con, $accountName, $specialty, $roomNumber, $email, $employee_username, $employee_password);
    }

    if (isset($_POST['deleteDoctor'])) {
        $employeeID = $_POST['employeeID'];
        deleteDoctor($con, $employeeID);
    }

    if (isset($_POST['trackHours'])) {
        $employeeID = $_POST['employeeID'];
        trackWorkingHours($con, $employeeID);
    }

    mysqli_close($con);
}
?>

<?php
//functions
//AddDoctors
function addDoctor($con, $accountName, $specialty, $roomNumber, $email, $employee_username, $employee_password) {
    
    $sql_accounts = "INSERT INTO Accounts (AccountName, AccountType) VALUES ('$accountName', 'employee')";
    if (mysqli_query($con, $sql_accounts)) {
       
        $accountID = mysqli_insert_id($con);

     
        $sql_employee = "INSERT INTO Employee (AccountID, AccountName, AccountType) VALUES ('$accountID', '$accountName', 'employee')";
        if (mysqli_query($con, $sql_employee)) {
           
            $employeeID = mysqli_insert_id($con);

            
            $sql_employee_details = "INSERT INTO Employee_Details (EmployeeID, EmployeeSpecialty, RoomNumber) VALUES ('$employeeID', '$specialty', '$roomNumber')";
            if (mysqli_query($con, $sql_employee_details)) {
               
                $sql_accdata = "INSERT INTO AccData (AccountID, AccountName, AccountEmail, AccountUsername, AccountPass) VALUES ('$accountID', '$accountName', '$email', '$employee_username', '$employee_password')";
                if (mysqli_query($con, $sql_accdata)) {
                    echo "New doctor added successfully";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

//DeleteDoctors
function deleteDoctor($con, $employeeID) {
    $sql = "DELETE FROM Employee WHERE EmployeeID = $employeeID";
    if (mysqli_query($con, $sql)) {
        echo "Doctor deleted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

//check working hours
function trackWorkingHours($con, $employeeID) {
    $sql = "SELECT EmployeeID, DayofWeek, TIMEDIFF(EndTime, StartTime) AS HoursWorked 
            FROM Employee_Schedule 
            WHERE EmployeeID = $employeeID";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Day: " . $row["DayofWeek"]. " - Hours Worked: " . $row["HoursWorked"]. "<br>";
        }
    } else {
        echo "No records found";
    }
}
?>